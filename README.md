# Vulnerable Websites for XSS Testing

Đây là 4 website mẫu, mỗi website chứa một loại lỗ hổng XSS cụ thể để phục vụ mục đích testing/học tập.

## ⚠️ Cảnh báo
**Các website này chỉ dành cho mục đích giáo dục và kiểm thử bảo mật. KHÔNG sử dụng cho mục đích xấu.**

---

## 1. DOM XSS (`dom_xss/`)

**Mô tả:** Lỗ hổng XSS xảy ra khi JavaScript phía client xử lý dữ liệu không an toàn và chèn trực tiếp vào DOM.

**File chính:** `index.html`

**Cách khai thác:**
```
index.html#<img src=x onerror=alert('XSS')>
index.html#<script>alert('XSS')</script>
```

**Vị trí lỗ hổng:**
- Dữ liệu từ `window.location.hash` được chèn trực tiếp vào `innerHTML`

---

## 2. Stored XSS (`stored_xss/`)

**Mô tả:** Lỗ hổng XSS xảy ra khi dữ liệu độc hại được lưu trữ trên server và hiển thị cho các user khác.

**File chính:** `index.php`

**Yêu cầu:** PHP server (XAMPP, WAMP, hoặc `php -S localhost:8000`)

**Cách khai thác:**
- Nhập vào form comment:
  - Name: `<script>alert('XSS')</script>`
  - Comment: `<img src=x onerror=alert('Stored XSS')>`

**Vị trí lỗ hổng:**
- Dữ liệu comment được lưu vào `comments.json` và hiển thị không escape

---

## 3. Attribute XSS (`attribute_xss/`)

**Mô tả:** Lỗ hổng XSS xảy ra khi dữ liệu user được chèn vào các attribute HTML không an toàn.

**File chính:** `index.php`

**Yêu cầu:** PHP server

**Cách khai thác:**
```
index.php?avatar=x" onerror="alert('XSS')
index.php?website=javascript:alert('XSS')
index.php?bio=" onmouseover="alert('XSS')
index.php?user=" onfocus="alert('XSS')" autofocus="
```

**Vị trí lỗ hổng:**
- Dữ liệu được chèn trực tiếp vào `src`, `href`, `title`, `data-user` attributes

---

## 4. Reflected XSS (`reflected_xss/`)

**Mô tả:** Lỗ hổng XSS xảy ra khi dữ liệu từ request được phản hồi ngay trong response mà không escape.

**File chính:** `index.php`

**Yêu cầu:** PHP server

**Cách khai thác:**
```
index.php?q=<script>alert('XSS')</script>
index.php?error=<img src=x onerror=alert('Error XSS')>
index.php?welcome=<svg onload=alert('Welcome XSS')>
```

**Vị trí lỗ hổng:**
- Parameter `q` (search query) được echo trực tiếp
- Parameter `error` hiển thị trong alert box
- Parameter `welcome` hiển thị trong welcome message

---

## Cách chạy

### Với PHP (cho stored_xss, attribute_xss, reflected_xss):
```bash
cd vulnerable_websites/stored_xss
php -S localhost:8001

cd vulnerable_websites/attribute_xss
php -S localhost:8002

cd vulnerable_websites/reflected_xss
php -S localhost:8003
```

### Với DOM XSS (chỉ cần mở file HTML):
- Mở trực tiếp `dom_xss/index.html` trong browser
- Hoặc serve qua web server

---

## Cấu trúc thư mục

```
vulnerable_websites/
├── README.md
├── dom_xss/
│   ├── index.html      # Trang chính với DOM XSS
│   ├── about.html
│   └── contact.html
├── stored_xss/
│   ├── index.php       # Trang comment với Stored XSS
│   ├── about.php
│   ├── rules.php
│   └── comments.json   # Lưu trữ comments
├── attribute_xss/
│   ├── index.php       # Profile page với Attribute XSS
│   ├── settings.php
│   └── friends.php
└── reflected_xss/
    ├── index.php       # E-Shop với Reflected XSS
    ├── products.php
    ├── cart.php
    └── contact.php
```

---

## Mục đích học tập

1. **DOM XSS**: Hiểu cách JavaScript xử lý dữ liệu không an toàn
2. **Stored XSS**: Hiểu nguy hiểm của việc lưu trữ dữ liệu không sanitize
3. **Attribute XSS**: Hiểu các context khác nhau trong HTML attributes
4. **Reflected XSS**: Hiểu cách tấn công qua URL parameters

---

## Cách fix (tham khảo)

- **DOM XSS**: Sử dụng `textContent` thay vì `innerHTML`, hoặc sanitize input
- **Stored XSS**: Escape output với `htmlspecialchars()` trong PHP
- **Attribute XSS**: Escape attributes properly, validate URLs
- **Reflected XSS**: Always escape user input before displaying
