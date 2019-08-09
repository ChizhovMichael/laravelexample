/*
  Inspired by: "Price Range Control"
  By: cubertodesign
  Link: https://www.instagram.com/p/Bs-0fByhwy8/
*/



document.addEventListener("DOMContentLoaded", function () {

    let minDollars = document.querySelector('#from');
    minDollars = minDollars.innerText.replace(/[^-0-9]/gim, '');
    minDollars = parseInt(minDollars);

    let maxDollars = document.querySelector('#to');
    maxDollars = maxDollars.innerText.replace(/[^-0-9]/gim, '');
    maxDollars = parseInt(maxDollars);

    let minSlider = document.querySelector('#min')
    let maxSlider = document.querySelector('#max')

    function numberWithSpaces(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ')
    }

    function updateDollars() {
        let fromValue = minSlider.value 
        let toValue = maxSlider.value

        document.querySelector('#from').textContent = `${numberWithSpaces(Math.floor(fromValue))} ₽`
        document.querySelector('#to').textContent = `${numberWithSpaces(Math.floor(toValue))} ₽`
    }

    maxSlider.addEventListener('input', () => {
        let minValue = parseInt(minSlider.value)
        let maxValue = parseInt(maxSlider.value)

        if (maxValue < minValue + 10) {
            minSlider.value = maxValue - 10

            if (minValue === parseInt(minSlider.min)) {
                maxSlider.value = 10
            }
        }

        updateDollars()
    })

    minSlider.addEventListener('input', () => {
        let minValue = parseInt(minSlider.value)
        let maxValue = parseInt(maxSlider.value)

        if (minValue > maxValue - 10) {
            maxSlider.value = minValue + 10

            if (maxValue === parseInt(maxSlider.max)) {
                minSlider.value = parseInt(maxSlider.max) - 10
            }
        }

        updateDollars()
    })


})




