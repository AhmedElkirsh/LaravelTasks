document.querySelector(".changeBtn").addEventListener("click", function () {
    // document.getElementById("image").click();
    alert("fuck you");
});

document.getElementById("image").addEventListener("change", function () {
    const fileInput = this;
    const file = fileInput.files[0];
    const svgIcon = document.querySelector(".h-12.w-12"); // The SVG icon
    const buttonText = document.querySelector(".changeBtn"); // Button text

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Hide SVG
            svgIcon.classList.add("hidden");

            // Create and insert the new image element if not already present
            let img = svgIcon.parentNode.querySelector("img");
            if (!img) {
                img = document.createElement("img");
                img.classList.add(
                    "h-12",
                    "w-12",
                    "object-cover",
                    "rounded-full"
                );
                svgIcon.parentNode.appendChild(img);
            }
            img.src = e.target.result; // Set the new image's src

            buttonText.textContent = truncateFilePath(file.name, 20); // Update button text
        };
        reader.readAsDataURL(file);
    } else {
        buttonText.textContent = "Change";
        svgIcon.classList.remove("hidden"); // Show SVG again
        const existingImg = svgIcon.parentNode.querySelector("img");
        if (existingImg) existingImg.remove(); // Remove the image if no file is chosen
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
