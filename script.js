const name = document.getElementById('name')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
    let messages = []
    if (käyttäjätunnus.value === '' || käyttäjätunnus.value == null) {
        messages.push('Anna käyttäjätunnus')  
    }

    if (salasana.value.length <= 2) {
        messages.push("Salasanan tulee olla vähintään 2 merkkiä")
    }
    if (messages.length > 0) {
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
    
})
