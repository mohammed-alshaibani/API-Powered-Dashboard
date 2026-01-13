# لوحة تحكم مع واجهات برمجة التطبيقات (APIs)

## نظرة عامة
هذا المشروع يوفر لوحة تحكم متكاملة مع واجهات برمجة تطبيقات (APIs) مبنية باستخدام Laravel مع Laravel Sanctum للمصادقة.

## المميزات

- نظام مصادقة متكامل باستخدام Laravel Sanctum
- واجهات برمجة تطبيقات (APIs) للتعامل مع:
  - المستخدمين والمصادقة
  - اللوحات الإعلانية (Banners)
  - الأقسام (Categories)
  - المنتجات (Products)
- وثائق تفصيلية للـ APIs
- دعم CORS للتواصل مع التطبيقات الخارجية

## المتطلبات الأساسية

- PHP 8.0 أو أحدث
- Composer
- Node.js و NPM
- قاعدة بيانات (MySQL/PostgreSQL/SQLite/SQL Server)
- Laravel Sanctum للمصادقة

## التثبيت

1. استنسخ المستودع:
   ```bash
   git clone [رابط المستودع]
   ```

2. قم بتثبيت حزم PHP:
   ```bash
   composer install
   ```

3. قم بإنشاء ملف `.env` من الملف النموذجي:
   ```bash
   cp .env.example .env
   ```

4. قم بإنشاء مفتاح التطبيق:
   ```bash
   php artisan key:generate
   ```

5. قم بتكوين إعدادات قاعدة البيانات في ملف `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=اسم_قاعدة_البيانات
   DB_USERNAME=اسم_المستخدم
   DB_PASSWORD=كلمة_المرور
   ```

6. قم بتشغيل الهجرات وبذر البيانات:
   ```bash
   php artisan migrate --seed
   ```

7. قم بتثبيت حزم Node.js:
   ```bash
   npm install
   ```

8. قم ببناء الأصول:
   ```bash
   npm run dev
   ```

9. قم بتشغيل خادم التطوير:
   ```bash
   php artisan serve
   ```

## واجهات برمجة التطبيقات (APIs)

### الحصول على رمز الوصول (Token)
```
POST /api/sanctum/token
```

**المعطيات المطلوبة:**
- email: البريد الإلكتروني للمستخدم
- password: كلمة المرور
- device_name: اسم الجهاز

### استرجاع معلومات المستخدم
```
GET /api/user
```
**رأس الطلب المطلوب:**
```
Authorization: Bearer [token]
Accept: application/json
```

### اللوحات الإعلانية (Banners)
```
GET /api/Banners/{id}
```

### الأقسام (Categories)
```
GET /api/Categories/All
```

### المنتجات (Products)
```
GET /api/Products/Category/{Id}  # المنتجات حسب القسم
GET /api/Products/{Id}           # تفاصيل منتج معين
```

## المصادقة
يستخدم المشروع Laravel Sanctum للمصادقة. يجب تضمين رمز الوصول (token) في رأس الطلب كالتالي:

```
Authorization: Bearer [your-token-here].
