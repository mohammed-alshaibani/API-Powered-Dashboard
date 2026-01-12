# لوحة تحكم مع واجهات برمجة التطبيقات (APIs)

## 📋 نظرة عامة

هذا المشروع يوفر لوحة تحكم متكاملة مع واجهات برمجة تطبيقات (APIs) مبنية باستخدام Laravel مع Laravel Sanctum للمصادقة. النظام مصمم لتوفير حل كامل لإدارة البيانات مع واجهة برمجة تطبيقات قوية وسهلة الاستخدام.

### ✨ المميزات الرئيسية

- 🔐 **نظام مصادقة متكامل** باستخدام Laravel Sanctum
- 🌐 **واجهات برمجة تطبيقات (APIs)** للتعامل مع:
  - المستخدمين والمصادقة
  - اللوحات الإعلانية (Banners)
  - الأقسام (Categories)
  - المنتجات (Products)
- 📚 **وثائق تفصيلية** للـ APIs
- 🌍 **دعم CORS** للتواصل مع التطبيقات الخارجية
- 📱 **تصميم متجاوب** يعمل على جميع الأجهزة
- 🚀 **أداء محسن** مع أفضل الممارسات

## 🛠️ التقنيات المستخدمة

| التقنية | الإصدار | الوصف |
|---------|---------|-------|
| **Laravel** | 9.x | إطار العمل PHP |
| **Laravel Sanctum** | Latest | مصادقة API |
| **MySQL** | 8.0+ | قاعدة البيانات |
| **Composer** | Latest | إدارة الحزم |

## 🚀 البدء السريع

### المتطلبات الأساسية

- PHP 8.0 أو أحدث
- Composer
- Node.js و NPM
- قاعدة بيانات (MySQL/PostgreSQL/SQLite/SQL Server)
- Laravel Sanctum للمصادقة

### خطوات التثبيت

1. **استنساخ المستودع**
   ```bash
   git clone [رابط المستودع]
   cd DashboardWithApis
   ```

2. **تثبيت حزم PHP**
   ```bash
   composer install
   ```

3. **إنشاء ملف .env من الملف النموذجي**
   ```bash
   cp .env.example .env
   ```

4. **إنشاء مفتاح التطبيق**
   ```bash
   php artisan key:generate
   ```

5. **تكوين إعدادات قاعدة البيانات في ملف .env**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=اسم_قاعدة_البيانات
   DB_USERNAME=اسم_المستخدم
   DB_PASSWORD=كلمة_المرور
   ```

6. **تشغيل الهجرات وبذر البيانات**
   ```bash
   php artisan migrate --seed
   ```

7. **تثبيت حزم Node.js**
   ```bash
   npm install
   ```

8. **بناء الأصول**
   ```bash
   npm run dev
   ```

9. **تشغيل خادم التطوير**
   ```bash
   php artisan serve
   ```

## 📚 واجهات برمجة التطبيقات (APIs)

### 🔐 المصادقة والحصول على رمز الوصول (Token)

#### طلب رمز الوصول
```http
POST /api/sanctum/token
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password",
    "device_name": "iPhone 12"
}
```

**الاستجابة الناجحة:**
```json
{
    "token": "1|abcdefghijklmnopqrstuvwxyz123456789",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "user@example.com"
    }
}
```

### 👤 معلومات المستخدم

#### استرجاع معلومات المستخدم الحالي
```http
GET /api/user
Authorization: Bearer [token]
Accept: application/json
```

**الاستجابة:**
```json
{
    "id": 1,
    "name": "John Doe",
    "email": "user@example.com",
    "created_at": "2023-01-01T00:00:00.000000Z",
    "updated_at": "2023-01-01T00:00:00.000000Z"
}
```

### 🎯 اللوحات الإعلانية (Banners)

#### الحصول على لوحة إعلانية محددة
```http
GET /api/Banners/{id}
Authorization: Bearer [token]
Accept: application/json
```

**الاستجابة:**
```json
{
    "id": 1,
    "title": "عنوان اللوحة",
    "image": "banner.jpg",
    "link": "https://example.com",
    "active": true,
    "created_at": "2023-01-01T00:00:00.000000Z"
}
```

### 📂 الأقسام (Categories)

#### الحصول على جميع الأقسام
```http
GET /api/Categories/All
Authorization: Bearer [token]
Accept: application/json
```

**الاستجابة:**
```json
[
    {
        "id": 1,
        "name": "الإلكترونيات",
        "description": "أجهزة إلكترونية متنوعة",
        "image": "electronics.jpg",
        "products_count": 15
    },
    {
        "id": 2,
        "name": "الملابس",
        "description": "ملابس للرجال والنساء",
        "image": "clothing.jpg",
        "products_count": 25
    }
]
```

### 🛍️ المنتجات (Products)

#### الحصول على المنتجات حسب القسم
```http
GET /api/Products/Category/{categoryId}
Authorization: Bearer [token]
Accept: application/json
```

**الاستجابة:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "لابتوب Dell",
            "description": "لابتوب عالي الأداء",
            "price": 5000.00,
            "image": "laptop.jpg",
            "category_id": 1,
            "stock": 10
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 50
    }
}
```

#### الحصول على تفاصيل منتج معين
```http
GET /api/Products/{productId}
Authorization: Bearer [token]
Accept: application/json
```

**الاستجابة:**
```json
{
    "id": 1,
    "name": "لابتوب Dell",
    "description": "لابتوب عالي الأداء مع مواصفات ممتازة",
    "price": 5000.00,
    "image": "laptop.jpg",
    "images": ["laptop1.jpg", "laptop2.jpg"],
    "category": {
        "id": 1,
        "name": "الإلكترونيات"
    },
    "stock": 10,
    "features": ["Intel i7", "16GB RAM", "512GB SSD"],
    "created_at": "2023-01-01T00:00:00.000000Z"
}
```

## 🔒 المصادقة والأمان

### استخدام رمز الوصول
يجب تضمين رمز الوصول (token) في رأس الطلب كالتالي:
```http
Authorization: Bearer [your-token-here]
Accept: application/json
```

### أفضل الممارسات الأمنية
- ✅ تأكد من استخدام HTTPS في بيئة الإنتاج
- ❌ لا تشارك رموز الوصول (tokens) مع أي شخص
- 🔒 استخدم سياسات CORS المناسبة
- ⏰ قم بتحديث رموز الوصول بشكل دوري
- 🚫 لا تخزن رموز الوصول في الكود الأمامي

## 📁 هيكل المشروع

```
DashboardWithApis/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── API/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── BannerController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   └── ProductController.php
│   │   │   └── Dashboard/
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Banner.php
│   │   ├── Category.php
│   │   └── Product.php
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── api.php
│   └── web.php
├── resources/
│   └── views/
└── .env.example
```

## 🔧 الأوامر المتاحة

### أوامر التطوير
```bash
# تشغيل خادم التطوير
php artisan serve

# إنشاء تحكم جديد
php artisan make:controller API/ProductController

# إنشاء نموذج جديد
php artisan make:model Product -m

# تشغيل الهجرات
php artisan migrate

# إعادة تعيين قاعدة البيانات
php artisan migrate:fresh --seed

# مسح الكاش
php artisan cache:clear
```

### أوامر الاختبار
```bash
# تشغيل جميع الاختبارات
php artisan test

# تشغيل اختبار محدد
php artisan test --filter ProductTest
```

## 📊 أمثلة الاستخدام

### مثال JavaScript (Fetch API)
```javascript
// تسجيل الدخول والحصول على التوكن
const login = async () => {
    const response = await fetch('/api/sanctum/token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email: 'user@example.com',
            password: 'password',
            device_name: 'Web App'
        })
    });
    
    const data = await response.json();
    return data.token;
};

// جلب المنتجات
const getProducts = async (token, categoryId) => {
    const response = await fetch(`/api/Products/Category/${categoryId}`, {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    });
    
    return await response.json();
};
```

### مثال cURL
```bash
# تسجيل الدخول
curl -X POST http://localhost:8000/api/sanctum/token \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password",
    "device_name": "cURL"
  }'

# جلب المنتجات
curl -X GET http://localhost:8000/api/Products/Category/1 \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Accept: application/json"
```

## 🐛 معالجة الأخطاء

### رموز الخطأ الشائعة

| رمز الحالة | الوصف | الحل |
|-----------|-------|------|
| 401 | غير مصرح (Unauthorized) | تحقق من التوكن |
| 403 | ممنوع (Forbidden) | تحقق من الصلاحيات |
| 404 | غير موجود (Not Found) | تحقق من الرابط |
| 422 | خطأ في التحقق (Validation Error) | تحقق من البيانات المدخلة |
| 500 | خطأ في الخادم (Server Error) | تحقق من السجلات |

### مثال استجابة خطأ
```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email field is required."
        ]
    }
}

**مبني بـ ❤️ باستخدام [Laravel](https://laravel.com/)**
