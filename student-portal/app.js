// वोकेशनल कोर्स डेटा
const courses = [
    {
        id: 1,
        name: "डेटा एनालिटिक्स",
        description: "डेट��� विश्लेषण और BI टूल्स सीखें",
        duration: "6 महीने",
        fee: "₹15,000"
    },
    {
        id: 2,
        name: "वेब डेवलपमेंट",
        description: "HTML, CSS, JavaScript और React सीखें",
        duration: "8 महीने",
        fee: "₹18,000"
    },
    {
        id: 3,
        name: "क्लाउड कंप्यूटिंग",
        description: "AWS और Azure क्लाउड प्लेटफॉर्म सीखें",
        duration: "6 महीने",
        fee: "₹20,000"
    },
    {
        id: 4,
        name: "साइबर सिक्योरिटी",
        description: "नेटवर्क सुरक्षा और एथिकल हैकिंग",
        duration: "7 महीने",
        fee: "₹22,000"
    },
    {
        id: 5,
        name: "AI और मशीन लर्निंग",
        description: "कृत्रिम बुद्धिमत्ता और मशीन लर्निंग बेसिक्स",
        duration: "9 महीने",
        fee: "₹25,000"
    },
    {
        id: 6,
        name: "डिजिटल मार्केटिंग",
        description: "SEO, सोशल मीडिया और कंटेंट मार्केटिंग",
        duration: "3 महीने",
        fee: "₹10,000"
    }
];

// LocalStorage से डेटा लोड करें या खाली array से शुरू करें
let studentsData = JSON.parse(localStorage.getItem('students')) || [];

// पेज लोड होने पर
document.addEventListener('DOMContentLoaded', function() {
    loadCourses();
    displayAllStudents();
    populateCourseSelect();
});

// कोर्स डिस्प्ले करें
function loadCourses() {
    const coursesList = document.getElementById('coursesList');
    coursesList.innerHTML = '';
    
    courses.forEach(course => {
        const courseCard = document.createElement('div');
        courseCard.className = 'course-card';
        courseCard.innerHTML = `
            <h3>${course.name}</h3>
            <p>${course.description}</p>
            <p><strong>अवधि:</strong> ${course.duration}</p>
            <p><strong>शुल्क:</strong> ${course.fee}</p>
        `;
        coursesList.appendChild(courseCard);
    });
}

// कोर्स dropdown को populate करें
function populateCourseSelect() {
    const courseSelect = document.getElementById('course');
    courses.forEach(course => {
        const option = document.createElement('option');
        option.value = course.id;
        option.textContent = course.name;
        courseSelect.appendChild(option);
    });
}

// फॉर्म सबमिशन हैंडल करें
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // फॉर्म डेटा प्राप्त करें
    const formData = {
        id: generateUniqueId(),
        fullName: document.getElementById('fullName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        dob: document.getElementById('dob').value,
        address: document.getElementById('address').value,
        courseId: parseInt(document.getElementById('course').value),
        courseName: getCourseNameById(parseInt(document.getElementById('course').value)),
        qualification: document.getElementById('qualification').value,
        aadhar: document.getElementById('aadhar').value,
        registrationDate: new Date().toLocaleDateString('hi-IN'),
        status: 'pending' // सत्यापन से पहले pending
    };
    
    // Validation
    if (!validateAadhar(formData.aadhar)) {
        showError('आधार नंबर 12 अंकों का होना चाहिए');
        return;
    }
    
    if (!validateEmail(formData.email)) {
        showError('कृपया सही ईमेल एड्रेस डालें');
        return;
    }
    
    if (!validatePhone(formData.phone)) {
        showError('फोन नंबर 10 अंकों का होना चाहिए');
        return;
    }
    
    // डुप्लिकेट चेक करें
    if (studentsData.some(student => student.aadhar === formData.aadhar)) {
        showError('यह आधार नंबर पहले से पंजीकृत है');
        return;
    }
    
    // डेटा को LocalStorage में सेव करें
    studentsData.push(formData);
    localStorage.setItem('students', JSON.stringify(studentsData));
    
    // सफलता संदेश दिखाएं
    showSuccess(`${formData.fullName}, आपक�� पंजीकरण सफल रहा! आपका आईडी: ${formData.id}`);
    
    // फॉर्म रीसेट करें
    this.reset();
    
    // डेटा टेबल अपडेट करें
    displayAllStudents();
});

// आधार नंबर validate करें
function validateAadhar(aadhar) {
    return /^\d{12}$/.test(aadhar);
}

// ईमेल validate करें
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// फोन नंबर validate करें
function validatePhone(phone) {
    return /^\d{10}$/.test(phone);
}

// यूनिक आईडी जनरेट करें
function generateUniqueId() {
    return 'STU' + Date.now() + Math.random().toString(36).substr(2, 9);
}

// कोर्स का नाम आईडी से प्राप्त करें
function getCourseNameById(id) {
    const course = courses.find(c => c.id === id);
    return course ? course.name : 'Unknown';
}

// सभी छात्र डेटा डिस्प्ले करें
function displayAllStudents() {
    const studentsList = document.getElementById('studentsList');
    
    if (studentsData.length === 0) {
        studentsList.innerHTML = '<p>कोई छात्र डेटा उपलब्ध नहीं है</p>';
        return;
    }
    
    let tableHTML = `
        <table>
            <thead>
                <tr>
                    <th>आईडी</th>
                    <th>नाम</th>
                    <th>ईमेल</th>
                    <th>फोन</th>
                    <th>कोर्स</th>
                    <th>आधार</th>
                    <th>स्टेटस</th>
                    <th>पंजीकरण तारीख</th>
                    <th>क्रिया</th>
                </tr>
            </thead>
            <tbody>
    `;
    
    studentsData.forEach(student => {
        tableHTML += `
            <tr>
                <td>${student.id}</td>
                <td>${student.fullName}</td>
                <td>${student.email}</td>
                <td>${student.phone}</td>
                <td>${student.courseName}</td>
                <td>${maskAadhar(student.aadhar)}</td>
                <td><span class="status-${student.status}">${getStatusLabel(student.status)}</span></td>
                <td>${student.registrationDate}</td>
                <td>
                    <button onclick="viewDetails('${student.id}')" class="btn-small">विस्तार</button>
                    <button onclick="verifyStudentById('${student.id}')" class="btn-small">सत्यापित करें</button>
                </td>
            </tr>
        `;
    });
    
    tableHTML += `
            </tbody>
        </table>
    `;
    
    studentsList.innerHTML = tableHTML;
}

// आधार नंबर को मास्क करें (सुरक्षा के लिए)
function maskAadhar(aadhar) {
    return 'XXXX XXXX ' + aadhar.slice(-4);
}

// स्टेटस लेबल प्राप्त करें
function getStatusLabel(status) {
    const labels = {
        'pending': 'लंबित',
        'verified': 'सत्यापित',
        'rejected': 'अस्वीकृत'
    };
    return labels[status] || status;
}

// छात्र डेटा खोजें और सत्यापित करें
function verifyStudent() {
    const searchAadhar = document.getElementById('searchAadhar').value.trim();
    const verifyResult = document.getElementById('verifyResult');
    
    if (!searchAadhar) {
        verifyResult.innerHTML = '<p style="color: red;">कृपया आधार नंबर डालें</p>';
        return;
    }
    
    const student = studentsData.find(s => s.aadhar === searchAadhar);
    
    if (!student) {
        verifyResult.classList.add('error');
        verifyResult.innerHTML = '<p>❌ आधार नंबर से कोई छात्र नहीं मिला</p>';
        return;
    }
    
    verifyResult.classList.remove('error');
    verifyResult.classList.add('success');
    verifyResult.innerHTML = `
        <h3>✅ छात्र मिल गया</h3>
        <p><strong>नाम:</strong> ${student.fullName}</p>
        <p><strong>ईमेल:</strong> ${student.email}</p>
        <p><strong>फोन:</strong> ${student.phone}</p>
        <p><strong>जन्म तारीख:</strong> ${student.dob}</p>
        <p><strong>कोर्स:</strong> ${student.courseName}</p>
        <p><strong>योग्यता:</strong> ${student.qualification}</p>
        <p><strong>स्टेटस:</strong> ${getStatusLabel(student.status)}</p>
        <p><strong>पंजीकरण तारीख:</strong> ${student.registrationDate}</p>
        <button onclick="approveStudent('${student.id}')" class="btn" style="margin-right: 10px;">अनुमोदित करें</button>
        <button onclick="rejectStudent('${student.id}')" class="btn" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);">अस्वीकार करें</button>
    `;
}

// छात्र को अनुमोदित करें
function approveStudent(studentId) {
    const student = studentsData.find(s => s.id === studentId);
    if (student) {
        student.status = 'verified';
        localStorage.setItem('students', JSON.stringify(studentsData));
        showSuccess(`${student.fullName} को सत्यापित कर दिया गया है`);
        verifyStudent();
        displayAllStudents();
    }
}

// छात्र को अस्वीकार करें
function rejectStudent(studentId) {
    const student = studentsData.find(s => s.id === studentId);
    if (student) {
        student.status = 'rejected';
        localStorage.setItem('students', JSON.stringify(studentsData));
        showSuccess(`${student.fullName} को अस्वीकार कर दिया गया है`);
        verifyStudent();
        displayAllStudents();
    }
}

// छात्र विवरण देखें
function viewDetails(studentId) {
    const student = studentsData.find(s => s.id === studentId);
    if (student) {
        const message = `
छात्र विवरण:

आईडी: ${student.id}
नाम: ${student.fullName}
ईमेल: ${student.email}
फोन: ${student.phone}
जन्म तारीख: ${student.dob}
पता: ${student.address}
कोर्स: ${student.courseName}
योग्यता: ${student.qualification}
आधार: ${maskAadhar(student.aadhar)}
स्टेटस: ${getStatusLabel(student.status)}
पंजीकरण तारीख: ${student.registrationDate}
        `;
        alert(message);
    }
}

// ID से छात्र को सत्यापित करें
function verifyStudentById(studentId) {
    const student = studentsData.find(s => s.id === studentId);
    if (student) {
        document.getElementById('searchAadhar').value = student.aadhar;
        verifyStudent();
        document.getElementById('verify').scrollIntoView({ behavior: 'smooth' });
    }
}

// CSV में निर्यात करें
function exportToCSV() {
    if (studentsData.length === 0) {
        alert('निर्यात करने के लिए कोई डेटा नहीं है');
        return;
    }
    
    let csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'आईडी,नाम,ईमेल,फोन,जन्म तारीख,कोर्स,योग्यता,स्टेटस,पंजीकरण तारीख\n';
    
    studentsData.forEach(student => {
        csvContent += `"${student.id}","${student.fullName}","${student.email}","${student.phone}","${student.dob}","${student.courseName}","${student.qualification}","${getStatusLabel(student.status)}","${student.registrationDate}"\n`;
    });
    
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', `students_data_${new Date().toLocaleDateString('hi-IN')}.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// सफलता संदेश दिखाएं
function showSuccess(message) {
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.textContent = message;
    document.body.insertBefore(successDiv, document.body.firstChild);
    
    setTimeout(() => {
        successDiv.remove();
    }, 3000);
}

// त्रुटि संदेश दिखाएं
function showError(message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    document.body.insertBefore(errorDiv, document.body.firstChild);
    
    setTimeout(() => {
        errorDiv.remove();
    }, 3000);
}