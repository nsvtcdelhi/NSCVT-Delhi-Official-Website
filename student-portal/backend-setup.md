# बैकएंड सेटअप गाइड

इस दस्तावेज़ में Node.js और Express का उपयोग करके बैकएंड सेटअप का विवरण दिया गया है।

## आवश्यक सॉफ्टवेयर

- Node.js (v14 या ऊपर)
- npm या yarn
- MongoDB या MySQL
- Postman (API टेस्टिंग के लिए)

## सेटअप चरण

### 1. Node.js प्रोजेक्ट शुरू करें

```bash
mkdir student-portal-backend
cd student-portal-backend
npm init -y
```

### 2. आवश्यक पैकेज इंस्टॉल करें

```bash
npm install express mongoose dotenv cors bcryptjs jsonwebtoken
npm install --save-dev nodemon
```

### 3. .env फाइल बनाएं

```
PORT=5000
MONGODB_URI=mongodb://localhost:27017/nscvt_student_portal
JWT_SECRET=your_secret_key_here
NODE_ENV=development
```

### 4. फाइल स्ट्रक्चर

```
student-portal-backend/
├── models/
│   ├── Student.js
│   ├── Course.js
│   └── Verification.js
├── routes/
│   ├── students.js
│   ├── courses.js
│   └── verification.js
├── middleware/
│   ├── auth.js
│   └── validation.js
├── controllers/
│   ├── studentController.js
│   ├── courseController.js
│   └── verificationController.js
├── server.js
└── package.json
```

### 5. Server.js बनाएं

इसके लिए अगला सेक्शन देखें।

## MongoDB स्कीमा

### छात्र स्कीमा

```javascript
const studentSchema = new Schema({
    fullName: String,
    email: String,
    phone: String,
    dob: Date,
    address: String,
    courseId: Number,
    qualification: String,
    aadhar: String, // यूनिक
    password: String,
    status: {
        type: String,
        enum: ['pending', 'verified', 'rejected'],
        default: 'pending'
    },
    registrationDate: Date,
    verifiedBy: String,
    verificationDate: Date
});
```

## API एंडपॉइंट्स

### छात्र संबंधित

- `POST /api/students/register` - नया छात्र पंजीकरण
- `GET /api/students` - सभी छात्र (Admin के लिए)
- `GET /api/students/:id` - विशेष छात्र विवरण
- `PUT /api/students/:id` - छात्र डेटा अपडेट
- `DELETE /api/students/:id` - छात्र डेटा हटाएं

### सत्यापन संबंधित

- `POST /api/verification/verify` - आधार द्वारा सत्यापन
- `PUT /api/verification/:id/approve` - अनुमोदन
- `PUT /api/verification/:id/reject` - अस्वीकार
- `GET /api/verification/status/:id` - स्थिति जांचें

### कोर्स संबंधित

- `GET /api/courses` - सभी कोर्स
- `GET /api/courses/:id` - विशेष कोर्स विवरण

## सुरक्षा सुविधाएं

1. **पासवर्ड एन्क्रिप्शन**: bcryptjs का उपयोग करें
2. **JWT टोकन**: प्रमाणीकरण के लिए
3. **CORS**: Cross-origin requests को नियंत्रित करें
4. **Input Validation**: सभी इनपुट्स को validate करें
5. **Rate Limiting**: API को spam से बचाएं

## डेटाबेस बैकअप

MongoDB के लिए:

```bash
mongodump --db nscvt_student_portal --out ./backups
mongorestore --db nscvt_student_portal ./backups/nscvt_student_portal
```

MySQL के लिए:

```bash
mysqldump -u root -p nscvt_portal > backup.sql
mysql -u root -p nscvt_portal < backup.sql
```

## तैनाती

### Heroku पर तैनाती

```bash
heroku login
heroku create your-app-name
git push heroku main
```

### AWS पर तैनाती

1. EC2 इंस्टेंस बनाएं
2. Node.js इंस्टॉल करें
3. फाइलें अपलोड करें
4. PM2 से शुरू करें: `pm2 start server.js`

## ट्रबलशूटिंग

- **पोर्ट पहले से उपयोग में**: `lsof -i :5000` और `kill -9 <PID>`
- **MongoDB कनेक्शन**: सुनिश्चित करें कि MongoDB चल रहा है
- **CORS त्रुटि**: frontend URL को whitelist में जोड़ें
