var accordionItems = document.getElementsByClassName('add-class');

for (var i = 0; i < accordionItems.length; i++) {
    accordionItems[i].addEventListener('click', function() {
        // Barcha elementlardan 'active_add' sınıfini olib tashlash
        for (var j = 0; j < accordionItems.length; j++) {
            if (accordionItems[j] !== this) {
                accordionItems[j].classList.remove('active_add');
            }
        }

        // 'active_add' sınıfini qo'shish yoki o'chirish
        if (this.classList.contains('active_add')) {
            this.classList.remove('active_add');
        } else {
            this.classList.add('active_add');
        }
    });
}


