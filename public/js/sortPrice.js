function sort(array, current_category) {
    console.log(array);
    
    let min = document.getElementById('input-text-min-aside-section-category').value
    let max = document.getElementById('input-text-max-aside-section-category').value
    if (min == '') min = 0;
    if (max == '') max = 999;

    let p = array.filter(x => x.price >= min && x.price <= max)

    let table = document.getElementById('table-category');

    table.innerHTML = "";

    for (let t of p) {

        let ih = '<tr class="tr-category"></tr>' +
            '<td class="td-1-category"><a href="' + current_category + '/' + t.name + '"><img src=".' + t.picture_url + '" class="image-category" alt="' + t.picture_alt + '"></a></td>' +
            '<td class="td-2-category">' +
            '<a href="' + current_category + '/' + t.name + '"><h4>' + t.name + '</h4></a>' +
            t.picture_alt + '</td>' +
            '<td class="td-3-category"><p>' + t.price + '€</p></td>' +
            '<td class="td-4-category"><input type="image" src="../pictures/suppr.png" class="suppr-category"></td>' +
            '</tr>';

        table.innerHTML += ih;
    }
}
