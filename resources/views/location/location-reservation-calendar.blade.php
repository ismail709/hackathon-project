@extends('layouts.app')

@section('content')
<div class="w-full max-w-5xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <!-- Header with Month & Year Select -->
    <div class="flex flex-row justify-between items-center gap-4 mb-6">
        <select id="month" class="text-base sm:text-lg font-semibold bg-[#db571b] text-white px-4 py-2 rounded-lg">
            <!-- JS will fill months -->
        </select>
        <select id="year" class="text-base sm:text-lg font-semibold bg-[#db571b] text-white px-4 py-2 rounded-lg">
            <!-- JS will fill years -->
        </select>
    </div>

    <!-- Calendar Grid Headers -->
    <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-[#91341b] mb-2">
        <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
    </div>

    <!-- Calendar Grid -->
    <div id="calendar" class="grid grid-cols-7 gap-2 sm:gap-4 text-sm sm:text-base">
        <!-- JS will generate days -->
    </div>
</div>

<script>
    const calendar = document.getElementById("calendar");
    const monthSelect = document.getElementById("month");
    const yearSelect = document.getElementById("year");

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    // Populate month and year
    months.forEach((m, i) => {
        const opt = document.createElement("option");
        opt.value = i;
        opt.textContent = m;
        monthSelect.appendChild(opt);
    });

    const currentYear = new Date().getFullYear();
    for (let y = currentYear - 5; y <= currentYear + 5; y++) {
        const opt = document.createElement("option");
        opt.value = y;
        opt.textContent = y;
        yearSelect.appendChild(opt);
    }

    // Set current month and year
    const today = new Date();
    monthSelect.value = today.getMonth();
    yearSelect.value = today.getFullYear();

    // Sample status data
    const status = {
        "2025-06-10": "reserved",
        "2025-06-15": "pending",
        "2025-06-20": "reserved",
        "2025-06-25": "pending"
    };

    function generateCalendar(month, year) {
        calendar.innerHTML = "";
        const firstDay = new Date(year, month, 1).getDay();
        const totalDays = new Date(year, month + 1, 0).getDate();

        // Empty cells before first day
        for (let i = 0; i < firstDay; i++) {
            const cell = document.createElement("div");
            calendar.appendChild(cell);
        }

        for (let day = 1; day <= totalDays; day++) {
            const dateStr = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
            const div = document.createElement("div");

            // Add colors based on status
            let bg = "bg-green-400"; // default available
            if (status[dateStr] === "pending") bg = "bg-yellow-400";
            if (status[dateStr] === "reserved") bg = "bg-red-400";

            div.className = `
                ${bg}
                aspect-square
                flex items-center justify-center
                text-black text-sm sm:text-lg
                rounded-lg font-bold
            `;
            div.textContent = day;
            calendar.appendChild(div);
        }
    }

    // Event listeners
    monthSelect.addEventListener("change", () => {
        generateCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

    yearSelect.addEventListener("change", () => {
        generateCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

    // Initial render
    generateCalendar(today.getMonth(), today.getFullYear());
</script>
@endsection
