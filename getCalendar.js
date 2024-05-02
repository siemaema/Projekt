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
	//Generowanie zawartości kalendarza
	const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
	for (let i = 1; i <= lastDayOfMonth; i++) {
		const dayBtn = document.createElement('button');
		dayBtn.textContent = i;
		dayBtn.classList.add('childContent');
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
