document.addEventListener('DOMContentLoaded', function () {
    const previewImageInput = document.getElementById('preview_image-input');
    const previewImageContainer = document.getElementById('preview_image-preview')

    previewImageInput.addEventListener("change", async (e) => {
        console.log('test');
        const selectedFileList = e.target.files;
        if (selectedFileList.length > 0) {
            const imageFile = selectedFileList[0];
            const isImageType = imageFile.type.startsWith("image");

            if (isImageType) {
                const fileReader = new FileReader();
                fileReader.onload = () => {
                    const srcData = fileReader.result;
                    const img = new Image();

                    img.src = srcData;

                    previewImageContainer.innerHTML = '';
                    previewImageContainer.append(img);
                };

                fileReader.readAsDataURL(imageFile);
            }
        }
    });

})

