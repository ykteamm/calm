// var accordionItems = document.getElementsByClassName('add-class');
//
// for (var i = 0; i < accordionItems.length; i++) {
//     accordionItems[i].addEventListener('click', function() {
//         // Barcha elementlardan 'active_add' sınıfini olib tashlash
//         for (var j = 0; j < accordionItems.length; j++) {
//             if (accordionItems[j] !== this) {
//                 accordionItems[j].classList.remove('active_add');
//             }
//         }
//
//         // 'active_add' sınıfini qo'shish yoki o'chirish
//         if (this.classList.contains('active_add')) {
//             this.classList.remove('active_add');
//         } else {
//             this.classList.add('active_add');
//         }
//     });
// }

// var accordionItems = document.getElementsByClassName('add-class');
//
// for (var i = 0; i < accordionItems.length; i++) {
//     accordionItems[i].addEventListener('click', function () {
//         var checkbox = this.querySelector('input[type="checkbox"]');
//
//         // console.log('Accordion item bosildi!');
//
//         if (checkbox) {
//             // console.log('1');
//             checkbox.checked = !checkbox.checked;
//             // console.log('2');
//             if (this.classList.contains('active_add')) {
//                 // console.log('3');
//                 checkbox.checked = false;
//             }
//         }else{
//             checkbox.checked = false;
//         }
//
//         if (this.classList.contains('active_add')) {
//             this.classList.remove('active_add');
//         } else {
//             this.classList.add('active_add');
//         }
//     });
// }

document.addEventListener('DOMContentLoaded', function () {
    var cards = document.getElementsByClassName('add-class');

    for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', function () {
            // Remove 'active_add_card' class and set input's checked to false for all elements
            for (var j = 0; j < cards.length; j++) {
                if (cards[j] !== this) {
                    cards[j].classList.remove('active_add');
                    var checkbox = cards[j].querySelector('input[type="checkbox"]');
                    if (checkbox) {
                        checkbox.checked = false;
                    }
                }
            }

            // Toggle 'active_add_card' class and set input's checked accordingly
            if (this.classList.contains('active_add')) {
                this.classList.remove('active_add');
                var thisCheckbox = this.querySelector('input[type="checkbox"]');
                if (thisCheckbox) {
                    thisCheckbox.checked = false;
                }
            } else {
                this.classList.add('active_add');
                var thisCheckbox = this.querySelector('input[type="checkbox"]');
                if (thisCheckbox) {
                    thisCheckbox.checked = true;
                }
            }
        });
    }
});

