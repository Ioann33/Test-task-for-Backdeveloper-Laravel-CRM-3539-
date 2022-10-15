let filters = document.querySelectorAll('.filters');
let resArr  = [];
let content = document.querySelector('.conttent');
function showLots(lots) {
    let tmp = {};
    content.innerHTML = '';
    for (let lot of lots) {
        tmp[lot.lot.id] = {
            id: lot.lot.id,
            name: lot.lot.name,
            description: lot.lot.description
        }

    }
    for (let i in tmp){
        console.log(tmp[i].id)
        content.innerHTML+= `
        <a class="card lot" style="width: 18rem;" href="{{ route('lots.show',${tmp[i].id}) }}">
                    <img src="https://zt-lis.gov.ua/uploads/pics/eef0015ce45c959b99924c4c64dc0a9a_original.230643_04.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">${tmp[i].name}</h5>
                        <p class="card-text">${tmp[i].description}</p>
                    </div>
                </a>
        `;
    }
    // console.log(tmp)
}
function getFiltered($arr){
    fetch('http://127.0.0.1:8000/api/getFiltered', {
        method: 'POST',
        body: JSON.stringify($arr),
        headers: {
            'Content-Type' : 'application/json',
        }
    })
        .then(res => res.json())
        .then(res => {
            showLots(res)
        })
}
for (let filter of filters) {
    filter.addEventListener('change', function (event){
        resArr = [];
        for (let item of filters) {
            if (item.checked === true){
                resArr.push(item.value);
                // console.log(item.value+' eeeee')
            }
        }
        // console.log(filter.checked)
        // console.log(filter.value)
        getFiltered(resArr)
        console.log(resArr)
    })
}
