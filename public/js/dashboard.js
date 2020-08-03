class Dropdown {
    static smoothClose(toggle, dropdownMenu) {
        console.log('Function CLOSE called !!')
        let link = toggle.querySelector('a')
        let arrow = link.lastChild
        let height = toggle.clientHeight


        toggle.style.height = height - dropdownMenu.clientHeight + "px"
        dropdownMenu.dataset.hidden = "true"

        link.classList.remove('active')
        arrow.style.transform = 'rotate(0deg)'
    }
    static smoothOpen(toggle, dropdownMenu) {
        console.log('Function OPEN called !!' + dropdownMenu.dataset.hidden)

        let link = toggle.querySelector('a')
        let arrow = link.lastChild
        let height = toggle.clientHeight

        toggle.style.height = height + dropdownMenu.clientHeight + "px"
        dropdownMenu.dataset.hidden = "false"

        link.classList.add('active')
        arrow.style.transform = 'rotate(90deg)'

    }
    static smoothToggle(toggle, dropdownMenu) {

        if (dropdownMenu.dataset.hidden === "true") {
            this.closeVisibleElements()
            this.smoothOpen(toggle, dropdownMenu)
        } else {
            this.smoothClose(toggle, dropdownMenu)
        }
    }

    static closeVisibleElements() {
        let visibleElements = document.querySelectorAll('[data-hidden="false"]')
        visibleElements.forEach(element => {
            console.log(element.parentNode)
            this.smoothClose(element.parentNode, element)
        })
    }
}

(function() {

    let dropdownMenuLink = document.querySelectorAll('.dropdown')

    dropdownMenuLink.forEach(element => {
        element.addEventListener('click', (e) => {
            e.stopPropagation()

            let dropdownMenu = element.querySelector('.dropdown-menu')

            Dropdown.smoothToggle(element, dropdownMenu)

        })
    })

    /*document.addEventListener('click', element => {
        Dropdown.closeVisibleElements()
    })*/


})()