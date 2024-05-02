const previousMonthBtn = document.querySelector('.previous-month-btn');
const nextMonthBtn = document.querySelector('.next-month-btn');
const monthElement = document.querySelector('.current-month');
const curenntDateSpan = document.querySelector('.current-date');
const calendarDaysContainer = document.querySelector('.calendar');
let date = new Date();
const getCurrentMonthName = (currentMonth) => {
	const monthNameTab = [
		'Styczeń',
		'Luty',
		'Marzec',
		'Kwiecień',
		'Maj',
		'Czerwiec',
		'Lipiec',
		'Sierpień',
		'Wrzesień',
		'Październik',
		'Listopad',
		'Grudzień',
	];
	return monthNameTab[currentMonth];
};

const getCurrentDay = (currentDay) => {
	const dayNameTab = [
		'Poniedziałek',
		'Wtorek',
		'Środa',
		'Czwartek',
		'Piątek',
		'Sobota',
		'Niedziela',
	];

	return dayNameTab[currentDay];
};

const initCalendar = () => {
	const currentDay = date.getDay();
	const currentYear = date.getFullYear();
	let currentMonth = date.getMonth();
	// Wyrzucenie nazwy miesiąca
	monthElement.textContent = getCurrentMonthName(currentMonth);
	//Wyrzucenie daty w formacie dd:mm:rrr
	const currentDate = date.toLocaleDateString('pl-PL', {
		day: '2-digit',
		month: '2-digit',
		year: 'numeric',
	});
	curenntDateSpan.textContent = `${getCurrentDay(currentDay)} ${currentDate}`;
	//Generowanie dni tygodnia kalendarza
	for (let i = 0; i < 7; i++) {
		const daySpan = document.createElement('span');
		daySpan.textContent = getCurrentDay(i);
		daySpan.classList.add('childTitle');
		calendarDaysContainer.appendChild(daySpan);
	}
	//Generowanie zawartości kalendarza
	const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay(),
		lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate(),
		lastDayOfMonth = new Date(
			currentYear,
			currentMonth,
			lastDateOfMonth
		).getDay(),
		lastDateofLastMonth = new Date(currentYear, currentMonth, 0).getDate();

	for (let i = firstDayOfMonth; i > 1; i--) {
		const dayBtn = document.createElement('button');
		dayBtn.textContent = lastDateofLastMonth - i + 2;
		dayBtn.classList.add('childContent', 'bg-gray-300');
		calendarDaysContainer.appendChild(dayBtn);
	}

	for (let i = 1; i <= lastDateOfMonth; i++) {
		const dayBtn = document.createElement('button');
		dayBtn.textContent = i;
		dayBtn.classList.add('childContent');
		calendarDaysContainer.appendChild(dayBtn);
	}
	for (let i = lastDayOfMonth; i < 6; i++) {
		const dayBtn = document.createElement('button');
		dayBtn.textContent = i - lastDayOfMonth + 1;
		dayBtn.classList.add('childContent', 'bg-gray-300');
		calendarDaysContainer.appendChild(dayBtn);
	}
};
const refreshCalendar = () => {
	calendarDaysContainer.innerHTML = '';
	initCalendar();
};
nextMonthBtn.addEventListener('click', () => {
	date.setMonth(date.getMonth() + 1);
	refreshCalendar();
});

previousMonthBtn.addEventListener('click', () => {
	date.setMonth(date.getMonth() - 1);
	refreshCalendar();
});

initCalendar();
