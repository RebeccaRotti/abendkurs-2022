const API_KEY = "59cdfcc9";

function displayMovies(movies) {
    let output = '';
    movies.forEach(function(movie) {
       output += `
       <section>
        <img src="${movie.Poster}" class="imgFluid">
        <div><h2>${movie.Title}</h2>
        <p>${movie.Year}<br>
        ${movie.Type}</p></div></section>`;
    });
    $('#movies').html(output);
}

function displayPagination(page, totalPages, searchTerm) {
    let prev = 1;
    if(page > 1) prev = page;
    $('#pagination').html(`<a onclick="getMovies('${searchTerm}', ${prev-1})">Previous</a>
                        <span>Total: ${totalPages}</span>
                        <a onclick="getMovies('${searchTerm}', ${page+1})">Next</a>`);
}

$('#search-form').on('submit', function (event) {
    event.preventDefault();
    const searchTerm = $('#search').val();
    getMovies(searchTerm, 1);
});

function getMovies(searchTerm, page) {

    if(page <= 0) page = 1;
    const url = `https://www.omdbapi.com/?apikey=${API_KEY}&s=${searchTerm}&page=${page}`;

    // AJAX
    /*$.ajax({
        url: url,
        dataType: "json"
    }).then(function (response) {
        console.log(response);
        const movies = response.Search || [];
        const totalPages = Math.ceil(response.totalResults / 10) || 0;
        displayMovies(movies);
        displayPagination(page, totalPages, searchTerm);
    }).catch(function (error) {
        console.error(error);
    });*/


    // Fetch
    fetch(url)
        .then(response => response.json())
        .then((response) => {
            const movies = response.Search || [];
            const totalPages = Math.ceil(response.totalResults / 10) || 0;
            displayMovies(movies);
            displayPagination(page, totalPages, searchTerm);
        })
        .catch(error => console.error(error));
}











