const cep = document.querySelector("#cep")
const showData = (result)=>{
        document.querySelector("#logradouro").value = result['logradouro']
        document.querySelector("#localidade").value = result['localidade']
        document.querySelector("#bairro").value = result['bairro']
        document.querySelector("#uf").value = result['uf']
    }
    cep.addEventListener("blur" , (e) => {
        let search = cep.value.replace("-","")
        const options = {
            method: 'GET',
            mode: 'cors',
            cache: 'default'
        }
        fetch(`https://viacep.com.br/ws/`+ search +`/json/`, options)
        .then(response=>{ response.json()
            .then( data => showData(data))
        })
        .catch(e => console.log("Deu Errado" + e,message))
    })