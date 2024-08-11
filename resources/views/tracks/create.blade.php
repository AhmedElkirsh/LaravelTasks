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
                            <x-form-input name="name" id="name" value="{{ old('name') }}"/>
                            <x-form-error name="name"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="prerequisite">Prerequisite</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="prerequisite" id="prerequisite" value="{{ old('prerequisite') }}"/>
                            <x-form-error name="prerequisite"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="hours">Hours</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="hours" id="hours" value="{{ old('hours') }}"/>
                            <x-form-error name="hours"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="image">Track Logo</x-form-label>
                        <x-form-input name="image" id="image" type="file" class="hidden"/>
                        <div class="col-span-full">
                            <div class="mt-2 flex items-center gap-x-3">
                                <img id="imagePreview" class="h-12 w-12 object-cover rounded-full" alt="Track Logo Preview">
                                <button type="button" class="changeBtn rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                            </div>
                        </div>
                        <x-form-error name="image"/>
                    </x-form-field>

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-button href="{{ route('tracks.index') }}">Cancel</x-button>
                <x-form-button>Save</x-form-button>
            </div>

        </div>
    </form>

    <script>
        const defaultImage = "{{ asset('storage/default-track-logo.png') }}";
        document.getElementById('imagePreview').src = defaultImage;

        document.querySelector(".changeBtn").addEventListener("click", function () {
            document.getElementById("image").click();
        });

        document.getElementById("image").addEventListener("change", function () {
            const fileInput = this;
            const file = fileInput.files[0];
            const imagePreview = document.getElementById("imagePreview");
            const buttonText = document.querySelector(".changeBtn");

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result; 
                    buttonText.textContent = truncateFilePath(file.name, 20); 
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = defaultImage;
                buttonText.textContent = "Change";
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