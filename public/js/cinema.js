///////links documentation//////////////
//https://developers.themoviedb.org/3/authentication/how-do-i-generate-a-session-id
//https://www.themoviedb.org/documentation/api/discover
//https://api.themoviedb.org/3/discover ou search/movie?
//API Key: 43031326262e3f481d9e4f999a63f52b
//CHAVE RESERVA -->3fd2be6f0c70a2a598f084ddfb75487c&page=1
///////////////////////////////////////////////////////////////////
const API_URL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=43031326262e3f481d9e4f999a63f52b&page=1'   //VER NA DOCUMENTATION-EXAMPLES OS URL, vai mostrar a primeira pagina &page=1 por popularidade  //ATENÇÃO https://api. 

const IMG_PATH = 'https://image.tmdb.org/t/p/w1280' //witdth 1280 sem /
const SEARCH_API = 'https://api.themoviedb.org/3/search/movie?api_key=43031326262e3f481d9e4f999a63f52b&query="'//query=" para concatenar o que está na search box com este url e apresentar resultado

const main = document.getElementById('main')
const form = document.getElementById('form')
const search = document.getElementById('search')
//GET INICIAL MOVIES
getMovies(API_URL)

async function getMovies (url) {
    const res = await fetch(url)
    const data = await res.json()

   // console.log(data.results) //console log de um array de 20 objetos, o top de filmes
    showMovies(data.results)
}

function showMovies(movies) {
    main.innerHTML =''

    movies.forEach((movie) => {
        const { title, poster_path, vote_average,overview, release_date} = movie
    

    const movieEl = document.createElement('div')
    movieEl.classList.add('movie')


    // var  moviearr = title+IMG_PATH+poster_path;
    // var jObj = {"title":title,"image":IMG_PATH + poster_path}
    // // var form_values = [title,IMG_PATH + poster_path]
    // var form_values = title
    
    // for (var i in jObj){
    //     form_values.push(encodeURI(i) + "=" + encodeURI(jObj[i]));
    // }

    // <a href="/cinema/create/${title}" class="my-links-nav post-cinema">Post a review</a>


    movieEl.innerHTML= `
            
    <form action="/cinema/create" method="GET" enctype="multipart/form-data">

            <button type="submit"
                class="post-review-btn">
                    Post Review

            </button>

           
            <input type="text" value="${title}" name="mtitle" style="display:none">
            <input type="text" value="${IMG_PATH + poster_path}" name="mimage" style="display:none">
            <input type="text" value="${release_date}" name="mdate" style="display:none">
            <input type="text" value="${vote_average}" name="mvote" style="display:none">


            <img src="${IMG_PATH + poster_path}"alt="${title}">
            
            <h5>${release_date}</h5>
            <div class="movie-info">
                <h3 class="movie-title" name="mtitle">${title}</h3>
                
                <span class="${getClassByRate(vote_average)}">${vote_average}</span>
            </div>
            <div class="overview">
                <h3>Overview</h3>
              ${overview}
            </div>
        </form>    
    `

    

    main.appendChild(movieEl)
})
}



function getClassByRate(voto) {
    if (voto >= 8) {
        return 'green'
    } else if (voto >= 5) {
        return 'orange'
    } else {
        return 'red'
    }
    }



form.addEventListener('submit', (e) => {
    e.preventDefault()//como é submit, para não submit a página

    const searchTerm = search.value //para usar a caixa de busca
    if (searchTerm && searchTerm !== ''){//se existir e for diferente de ''
        getMovies(SEARCH_API + searchTerm)//SEARCH_API tem o query e vai concatenar o searchTerm
        search.value = ''//para por o campo de busca vazio novamente
    }else {
        window.location.reload()
    }
})

