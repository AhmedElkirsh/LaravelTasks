<x-layout>
    <x-slot:heading>
        Add a Track
    </x-slot:heading>
    <form action="/tracks" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <x-form-field>
                <x-form-label for="name">Track Name</x-form-label>
                <div class="mt-2">
                    <x-form-input name="name" id="name" value="{{ $track->name }}"/>
                    <x-form-error name="name"/>
                </div>
            </x-form-field>
            
            <x-form-field>
                <x-form-label for="prerequisite">Prerequisite</x-form-label>
                <div class="mt-2">
                    <x-form-input name="prerequisite" id="prerequisite" value="{{ $track->prerequisite }}"/>
                    <x-form-error name="prerequisite"/>
                </div>
            </x-form-field>
            
            <x-form-field>
                <x-form-label for="hours">Hours</x-form-label>
                <div class="mt-2">
                    <x-form-input name="hours" id="hours" value="{{ $track->hours }}"/>
                        <x-form-error name="hours"/>
                    </div>
                </x-form-field>
                
                <x-form-field>
                    <x-form-label for="image">Track Logo</x-form-label>
                    <x-form-input name="image" id="image" type="file" class="hidden"/>
                    <div class="col-span-full">
                        <div class="mt-2 flex items-center gap-x-3">
                          <!-- Display the existing image if available -->
                          @if($track->image)
                            <img id="currentImage" src="{{ asset('storage/' . $track->image) }}" class="h-12 w-12 object-cover rounded-full" alt="Current Image">
                          @else
                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                            </svg>
                          @endif
                          <button type="button" class="changeBtn rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                        </div>
                    </div>
                    <x-form-error name="image"/>
            </x-form-field>

        </div>

    </div>
    
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-button href="{{ route('tracks.index', $track) }}">Cancel</x-button>
        <x-form-button>Save</x-form-button>
    </div>
    
</form>
<script>
    document.querySelector(".changeBtn").addEventListener("click", function () {
        document.getElementById("image").click();
    });

    document.getElementById("image").addEventListener("change", function () {
        const fileInput = this;
        const file = fileInput.files[0];
        const currentImage = document.getElementById("currentImage"); 
        const svgIcon = document.querySelector(".h-12.w-12"); 
        const buttonText = document.querySelector(".changeBtn"); 

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Hide SVG
                svgIcon.classList.add("hidden");

                // Create or update the image element
                let img = document.querySelector(".imagePreview");
                if (!img) {
                    img = document.createElement("img");
                    img.classList.add("imagePreview", "h-12", "w-12", "object-cover", "rounded-full");
                    svgIcon.parentNode.insertBefore(img, buttonText);
                }
                img.src = e.target.result;

                buttonText.textContent = truncateFilePath(file.name, 20);
            };
            reader.readAsDataURL(file);
        } else {
            // Reset to current image
            buttonText.textContent = "Change";
            svgIcon.classList.remove("hidden"); 

            // Remove preview image if it exists
            const existingImg = document.querySelector(".imagePreview");
            if (existingImg) existingImg.remove();

            // Restore the current image
            if (currentImage) {
                svgIcon.parentNode.insertBefore(currentImage, buttonText);
            }
        }
    });

    function truncateFilePath(fileName, maxLength) {
        if (fileName.length <= maxLength) return fileName;
        return (
            fileName.substring(0, maxLength / 2) +
            "..." +
            fileName.substring(fileName.length - maxLength / 2)
        );
    }
</script>


</x-layout>
