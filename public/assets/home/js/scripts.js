
$(document).ready(function () {

    var images = data;
    // console.log(images);

    // Tạo các phần tử HTML tương ứng với danh sách ảnh
    var galleryContainer = document.getElementById('galleryContainer');

    for (var i = 0; i < images.length; i++) {
        (function (image) { // Sử dụng closure để bảo toàn giá trị của biến image
            var galleryItem = document.createElement('div');
            galleryItem.className = 'gallery-item';

            var imageElement = document.createElement('img');
            image.src = "./assets/home/" + image.src;
            imageElement.src =  image.src;

            // Sử dụng closure để truy cập vào giá trị "url" từ dữ liệu JSON
            function showConfirmationDialog(url, scr_image, description) {
                Swal.fire({
                    title: '確認下載檔案？',
                    text: description,
                    imageUrl: scr_image,
                    showCancelButton: true,
                    confirmButtonText: '是',
                    cancelButtonText: '否',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            }

            // Sử dụng hàm để hiển thị cửa sổ thông báo khi hình ảnh được click
            galleryItem.addEventListener('click', function () {
                //   console.log(image);
                showConfirmationDialog(image.url, image.src, image.description);
            });

            galleryItem.appendChild(imageElement);

            var descriptionElement = document.createElement('p');
            descriptionElement.textContent = image.description;
            galleryItem.appendChild(descriptionElement);

            galleryContainer.appendChild(galleryItem);
        })(images[i]);
    }
})


