// डिजिटल घड़ी ऐप्लिकेशन

const TIMEZONES = {
    'भारत (IST)': 'Asia/Kolkata',
    'लंदन (GMT/BST)': 'Europe/London',
    'न्यूयॉर्क (EST/EDT)': 'America/New_York',
    'लॉस एंजिल्स (PST/PDT)': 'America/Los_Angeles',
    'टोक्यो (JST)': 'Asia/Tokyo',
    'सिडनी (AEDT/AEST)': 'Australia/Sydney',
    'दुबई (GST)': 'Asia/Dubai',
    'सिंगापुर (SGT)': 'Asia/Singapore',
    'बैंकॉक (ICT)': 'Asia/Bangkok',
    'हांगकांग (HKT)': 'Asia/Hong_Kong',
    'मुंबई (IST)': 'Asia/Kolkata',
    'पेरिस (CET/CEST)': 'Europe/Paris',
    'बर्लिन (CET/CEST)': 'Europe/Berlin',
    'मॉस्को (MSK)': 'Europe/Moscow',
    'ब्राजील (BRT/BRST)': 'America/Sao_Paulo',
    'मेक्सिको (CST/CDT)': 'America/Mexico_City',
    'कनाडा (EST/EDT)': 'America/Toronto',
    'दक्षिण अफ्रीका (SAST)': 'Africa/Johannesburg'
};

let selectedClocks = ['Asia/Kolkata'];
let is24Hour = true;
let showSeconds = true;
let soundEnabled = true;
let alarms = [];
let analogCanvas = null;
let analogCtx = null;

// पेज लोड होने पर सभी चीज़ें तैयार करें
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    // Timezone dropdown को populate करें
    populateTimezoneDropdown();
    
    // Analog canvas setup करें
    analogCanvas = document.getElementById('analogClock');
    analogCtx = analogCanvas.getContext('2d');
    
    // Event listeners add करें
    document.getElementById('addTimezone').addEventListener('click', addTimezone);
    document.getElementById('toggleFormat').addEventListener('click', toggleFormat);
    document.getElementById('toggleSound').addEventListener('click', toggleSound);
    document.getElementById('setAlarm').addEventListener('click', setAlarm);
    
    // Settings
    document.getElementById('show24Hour').addEventListener('change', function() {
        is24Hour = this.checked;
        updateClocks();
    });
    
    document.getElementById('showSeconds').addEventListener('change', function() {
        showSeconds = this.checked;
        updateClocks();
    });
    
    document.getElementById('showAnalog').addEventListener('change', function() {
        document.querySelector('.analog-section').style.display = this.checked ? 'block' : 'none';
    });
    
    document.getElementById('darkMode').addEventListener('change', function() {
        document.body.classList.toggle('dark-mode');
    });
    
    // LocalStorage से saved settings लोड करें
    loadSettings();
    
    // घड़ी को हर सेकंड अपडेट करें
    updateClocks();
    setInterval(updateClocks, 1000);
    
    // Alarms को हर सेकंड चेक करें
    setInterval(checkAlarms, 1000);
}

// Timezone dropdown को populate करें
function populateTimezoneDropdown() {
    const select = document.getElementById('timezoneSelect');
    Object.keys(TIMEZONES).forEach(zone => {
        const option = document.createElement('option');
        option.value = TIMEZONES[zone];
        option.textContent = zone;
        select.appendChild(option);
    });
}

// नया timezone जोड़ें
function addTimezone() {
    const select = document.getElementById('timezoneSelect');
    const timezone = select.value;
    
    if (!timezone) {
        alert('कृपया एक समय क्षेत्र चुनें');
        return;
    }
    
    if (selectedClocks.includes(timezone)) {
        alert('यह समय क्षेत्र पहले से जोड़ा जा चुका है');
        return;
    }
    
    selectedClocks.push(timezone);
    saveSettings();
    updateClocks();
    select.value = '';
}

// Timezone हटाएं
function removeTimezone(timezone) {
    selectedClocks = selectedClocks.filter(tz => tz !== timezone);
    saveSettings();
    updateClocks();
}

// सभी घड़ियों को अपडेट करें
function updateClocks() {
    const now = new Date();
    
    // मुख्य घड़ी को अपडेट करें (IST)
    updateMainClock(now);
    
    // सभी clock cards को अपडेट करें
    updateClockCards(now);
    
    // Analog घड़ी को ड्रा करें
    drawAnalogClock(now, 'Asia/Kolkata');
}

// मुख्य घड़ी को अपडेट करें
function updateMainClock(now) {
    const timeStr = formatTime(now, 'Asia/Kolkata');
    const dateStr = formatDate(now, 'hi-IN');
    
    document.getElementById('mainTime').textContent = timeStr;
    document.getElementById('mainDate').textContent = dateStr;
    document.getElementById('mainTimezone').textContent = 'भारतीय मानक समय (IST)';
}

// Clock cards को अपडेट करें
function updateClockCards(now) {
    const container = document.getElementById('clocksContainer');
    container.innerHTML = '';
    
    selectedClocks.forEach(timezone => {
        const timeInTZ = new Date(now.toLocaleString('en-US', { timeZone: timezone }));
        const timeStr = formatTime(timeInTZ, timezone);
        const dateStr = formatDate(timeInTZ, 'hi-IN');
        const tzName = getTimezoneName(timezone);
        const offset = getTimezoneOffset(timezone);
        
        const card = document.createElement('div');
        card.className = 'clock-card';
        card.innerHTML = `
            <button class="remove-btn" onclick="removeTimezone('${timezone}')">
                <i class="fas fa-times"></i>
            </button>
            <div class="clock-timezone">${tzName}</div>
            <div class="clock-time">${timeStr}</div>
            <div class="clock-date">${dateStr}</div>
            <div class="clock-offset">${offset}</div>
        `;
        container.appendChild(card);
    });
}

// समय को फॉर्मेट करें
function formatTime(date, timezone) {
    const options = {
        timeZone: timezone,
        hour: '2-digit',
        minute: '2-digit',
        second: showSeconds ? '2-digit' : undefined,
        hour12: !is24Hour
    };
    
    return new Intl.DateTimeFormat('en-US', options).format(date);
}

// तारीख को फॉर्मेट करें
function formatDate(date, locale) {
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    
    return new Intl.DateTimeFormat(locale, options).format(date);
}

// Timezone का नाम प्राप्त करें
function getTimezoneName(timezone) {
    for (let [name, tz] of Object.entries(TIMEZONES)) {
        if (tz === timezone) return name;
    }
    return timezone;
}

// Timezone का ऑफसेट प्राप्त करें
function getTimezoneOffset(timezone) {
    const now = new Date();
    const indiaTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' }));
    const tzTime = new Date(now.toLocaleString('en-US', { timeZone: timezone }));
    
    const diffMs = tzTime - indiaTime;
    const diffHours = diffMs / (1000 * 60 * 60);
    
    const sign = diffHours >= 0 ? '+' : '';
    const hours = Math.floor(Math.abs(diffHours));
    const minutes = Math.round((Math.abs(diffHours) % 1) * 60);
    
    return `UTC ${sign}${hours}:${minutes.toString().padStart(2, '0')}`;
}

// एनालॉग घड़ी को ड्रा करें
function drawAnalogClock(now, timezone) {
    const timeInTZ = new Date(now.toLocaleString('en-US', { timeZone: timezone }));
    const radius = analogCanvas.width / 2;
    const ctx = analogCtx;
    
    // Clear
    ctx.fillStyle = '#f5f5f5';
    ctx.fillRect(0, 0, analogCanvas.width, analogCanvas.height);
    
    // Center circle
    ctx.fillStyle = '#667eea';
    ctx.beginPath();
    ctx.arc(radius, radius, radius - 20, 0, 2 * Math.PI);
    ctx.fill();
    
    // Border
    ctx.strokeStyle = '#667eea';
    ctx.lineWidth = 3;
    ctx.beginPath();
    ctx.arc(radius, radius, radius - 20, 0, 2 * Math.PI);
    ctx.stroke();
    
    // Draw numbers
    ctx.fillStyle = 'white';
    ctx.font = 'bold 16px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    
    for (let i = 1; i <= 12; i++) {
        const angle = (i - 3) * (Math.PI / 6);
        const x = radius + (radius - 40) * Math.cos(angle);
        const y = radius + (radius - 40) * Math.sin(angle);
        ctx.fillText(i, x, y);
    }
    
    // Get time
    const hours = timeInTZ.getHours() % 12;
    const minutes = timeInTZ.getMinutes();
    const seconds = timeInTZ.getSeconds();
    
    // Hour hand
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 6;
    ctx.beginPath();
    const hourAngle = (hours + minutes / 60) * (Math.PI / 6) - Math.PI / 2;
    ctx.moveTo(radius, radius);
    ctx.lineTo(radius + 60 * Math.cos(hourAngle), radius + 60 * Math.sin(hourAngle));
    ctx.stroke();
    
    // Minute hand
    ctx.lineWidth = 4;
    ctx.beginPath();
    const minuteAngle = minutes * (Math.PI / 30) - Math.PI / 2;
    ctx.moveTo(radius, radius);
    ctx.lineTo(radius + 90 * Math.cos(minuteAngle), radius + 90 * Math.sin(minuteAngle));
    ctx.stroke();
    
    // Second hand
    ctx.strokeStyle = '#ff6b6b';
    ctx.lineWidth = 2;
    ctx.beginPath();
    const secondAngle = seconds * (Math.PI / 30) - Math.PI / 2;
    ctx.moveTo(radius, radius);
    ctx.lineTo(radius + 100 * Math.cos(secondAngle), radius + 100 * Math.sin(secondAngle));
    ctx.stroke();
    
    // Center dot
    ctx.fillStyle = 'white';
    ctx.beginPath();
    ctx.arc(radius, radius, 5, 0, 2 * Math.PI);
    ctx.fill();
}

// समय प्रारूप को टॉगल करें
function toggleFormat() {
    is24Hour = !is24Hour;
    document.getElementById('show24Hour').checked = is24Hour;
    document.getElementById('toggleFormat').textContent = is24Hour ? '24 घंटे' : '12 घंटे';
    saveSettings();
    updateClocks();
}

// ध्वनि को टॉगल करें
function toggleSound() {
    soundEnabled = !soundEnabled;
    const btn = document.getElementById('toggleSound');
    if (soundEnabled) {
        btn.innerHTML = '<i class="fas fa-volume-up"></i> ध्वनि चालू';
        btn.classList.remove('disabled');
    } else {
        btn.innerHTML = '<i class="fas fa-volume-mute"></i> ध्वनि बंद';
        btn.classList.add('disabled');
    }
}

// अलर्ट सेट करें
function setAlarm() {
    const timeInput = document.getElementById('alarmTime').value;
    const labelInput = document.getElementById('alarmLabel').value;
    
    if (!timeInput) {
        alert('कृपया समय दर्ज करें');
        return;
    }
    
    const alarm = {
        id: Date.now(),
        time: timeInput,
        label: labelInput || 'बिना शीर्षक का अलर्ट',
        active: true
    };
    
    alarms.push(alarm);
    saveSettings();
    displayAlarms();
    
    document.getElementById('alarmTime').value = '';
    document.getElementById('alarmLabel').value = '';
}

// अलर्ट्स को डिस्प्ले करें
function displayAlarms() {
    const container = document.getElementById('alarmsList');
    container.innerHTML = '';
    
    if (alarms.length === 0) {
        container.innerHTML = '<p>कोई अलर्ट सेट नहीं है</p>';
        return;
    }
    
    alarms.forEach(alarm => {
        const item = document.createElement('div');
        item.className = 'alarm-item';
        item.innerHTML = `
            <div class="alarm-info">
                <div class="alarm-time">${alarm.time}</div>
                <div class="alarm-label">${alarm.label}</div>
            </div>
            <button class="alarm-delete" onclick="deleteAlarm(${alarm.id})">
                हटाएं
            </button>
        `;
        container.appendChild(item);
    });
}

// अलर्ट हटाएं
function deleteAlarm(id) {
    alarms = alarms.filter(alarm => alarm.id !== id);
    saveSettings();
    displayAlarms();
}

// अलर्ट्स को चेक करें
function checkAlarms() {
    const now = new Date();
    const currentTime = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
    
    alarms.forEach(alarm => {
        if (alarm.active && alarm.time === currentTime) {
            triggerAlarm(alarm);
            alarm.active = false;
        }
    });
}

// अलर्ट को ट्रिगर करें
function triggerAlarm(alarm) {
    // Main clock को highlight करें
    const mainClock = document.querySelector('.main-clock');
    mainClock.classList.add('alarm-active');
    
    // ध्वनि बजाएं (अगर enabled है)
    if (soundEnabled) {
        playAlarmSound();
    }
    
    // Alert दिखाएं
    alert(`🔔 अलर्ट: ${alarm.label}`);
    
    // 3 सेकंड बाद highlight हटाएं
    setTimeout(() => {
        mainClock.classList.remove('alarm-active');
    }, 3000);
}

// अलर्ट ध्वनि बजाएं
function playAlarmSound() {
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    const gain = audioContext.createGain();
    
    oscillator.connect(gain);
    gain.connect(audioContext.destination);
    
    oscillator.frequency.value = 800;
    oscillator.type = 'sine';
    
    gain.gain.setValueAtTime(0.3, audioContext.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
    
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.5);
}

// Settings को save करें
function saveSettings() {
    const settings = {
        selectedClocks,
        is24Hour,
        showSeconds,
        soundEnabled,
        alarms
    };
    localStorage.setItem('clockSettings', JSON.stringify(settings));
}

// Settings को load करें
function loadSettings() {
    const saved = localStorage.getItem('clockSettings');
    if (saved) {
        const settings = JSON.parse(saved);
        selectedClocks = settings.selectedClocks || ['Asia/Kolkata'];
        is24Hour = settings.is24Hour !== false;
        showSeconds = settings.showSeconds !== false;
        soundEnabled = settings.soundEnabled !== false;
        alarms = settings.alarms || [];
        
        document.getElementById('show24Hour').checked = is24Hour;
        document.getElementById('showSeconds').checked = showSeconds;
        document.getElementById('darkMode').checked = false;
        
        displayAlarms();
        updateClocks();
    }
}
