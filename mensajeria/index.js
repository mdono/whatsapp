let token = 'TOKEN'
let telefonoId = 'ID_NUMBER'
let telefono = 'PHONE_NUMBER'

var url = 'https://graph.facebook.com/v15.0/' + telefonoId + '/messages'
var mensaje = {
  messaging_product: 'whatsapp',
  to: telefono,
  type: 'template',
  template: {
    name:'hello_world',
    language:{ code: 'en_US' }
  }
}

var peticion = {
  method: 'POST',
  headers: {
    'Authorization': 'Bearer ' + token,
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(mensaje),
  json: true
};

fetch(url, peticion)
  .then(mensaje => {
    return mensaje.json()
  })
  .then(res => {
    console.log(res)
  })
  .catch(error => console.log(error))