// var accordionItems = document.getElementsByClassName('card_active');
//
// for (var i = 0; i < accordionItems.length; i++) {
//     accordionItems[i].addEventListener('click', function () {
//
//         console.log('Accordion item bosildi!');
//         if (this.classList.contains('active_add_card')) {
//             this.classList.remove('active_add_card');
//         } else {
//             this.classList.add('active_add_card');
//         }
//     });
// }
//

// var accordionItems = document.getElementsByClassName('card_active');
//
// for (var i = 0; i < accordionItems.length; i++) {
//     var checkbox = accordionItems[i].querySelector('input[type="checkbox"]');
//
//     accordionItems[i].addEventListener('click', function () {
//         console.log('Accordion item bosildi!');
//
//         // Toggle the active_add_card class based on the checkbox state
//         if (this.classList.contains('active_add_card')) {
//             this.classList.remove('active_add_card');
//             checkbox.checked = false; // Uncheck the checkbox
//         } else {
//             this.classList.add('active_add_card');
//             checkbox.checked = true; // Check the checkbox
//         }
//     });
//
//     // Prevent the click on the checkbox from triggering the parent div click event
//     checkbox.addEventListener('click', function (event) {
//         event.stopPropagation();
//     });
// }

// var checkboxes = document.querySelectorAll('.card_active input[type="checkbox"]');

// checkboxes.forEach(function (checkbox) {
//     checkbox.addEventListener('change', function () {
//         var parentCard = this.closest('.card_active');
//
//         if (this.checked) {
//             parentCard.classList.add('active_add_card');
//         } else {
//             parentCard.classList.remove('active_add_card');
//         }
//     });
// });

var accordionItems = document.getElementsByClassName('card_active');

for (var i = 0; i < accordionItems.length; i++) {
    accordionItems[i].addEventListener('click', function () {
        var checkbox = this.querySelector('input[type="checkbox"]');

        // console.log('Accordion item bosildi!');

        if (checkbox) {
            // console.log('1');
            checkbox.checked = !checkbox.checked;
            // console.log('2');
            if (this.classList.contains('active_add_card')) {
                // console.log('3');
                checkbox.checked = false;
            }
        }else{
            checkbox.checked = false;
        }

        if (this.classList.contains('active_add_card')) {
            this.classList.remove('active_add_card');
        } else {
            this.classList.add('active_add_card');
        }
    });
}








