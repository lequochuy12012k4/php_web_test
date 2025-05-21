# Sử dụng base image PHP với Apache.
# Chúng ta chọn phiên bản 8.2-apache để đảm bảo tương thích tốt.
FROM php:8.2-apache

# Thiết lập thư mục làm việc bên trong container.
# Apache mặc định sẽ tìm kiếm các file web trong /var/www/html.
WORKDIR /var/www/html

# Sao chép tất cả các file từ thư mục 'public' của bạn vào thư mục làm việc trong container.
# Lệnh COPY này sẽ đưa 'index.php' vào '/var/www/html/index.php'.
COPY public/ .

# Kích hoạt module Apache 'rewrite'.
# Điều này hữu ích cho các framework PHP có friendly URL (ví dụ: Laravel, Symfony).
# Mặc dù không cần thiết cho index.php đơn giản này, nhưng nó là một thực hành tốt.
RUN a2enmod rewrite

# Đặt quyền cho thư mục.
# 'www-data' là người dùng/nhóm mà Apache chạy dưới.
# Điều này đảm bảo Apache có thể đọc và ghi (nếu cần) vào các file.
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Docker sẽ tự động expose cổng 80 vì base image 'php:apache' đã làm điều này.
# Tuy nhiên, việc khai báo EXPOSE một cách rõ ràng là một tài liệu tốt.
EXPOSE 80

# Lệnh mặc định khi container khởi động.
# 'apache2-foreground' là lệnh mặc định cho base image Apache để chạy Apache ở foreground.
CMD ["apache2-foregroun"]