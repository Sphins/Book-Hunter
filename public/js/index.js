document.addEventListener('DOMContentLoaded', function() {
  const loadMoreBooks = document.getElementById('loadMoreBooks');
  const loadMoreAuthors = document.getElementById('loadMoreAuthors');
  
  
  var offSet = 6;


  if(loadMoreBooks !== null){
    loadMoreBooks.addEventListener('click', function(e) {
      e.preventDefault();
      var id = 'books-list';
      var ajaxurl = 'loadMoreBooks';
      loadMore(id,ajaxurl);
    });
  }

  if(loadMoreAuthors !== null){
    loadMoreAuthors.addEventListener('click', function(e){
    e.preventDefault();
    const id = 'authors-list';
    const ajaxurl = 'loadMoreAuthors';
    loadMore(id,ajaxurl);
  })
  }


  function loadMore(id, ajaxurl) {
    const url = `?ajax=${ajaxurl}&offSet=${offSet}`;
  
    fetch(url)
      .then(function(response) {
        return response.text();
      })
      .then(function(code) {
        const listBooks = document.getElementById(id);
        listBooks.innerHTML += code;
  

        var bookPreviews = listBooks.querySelectorAll('.post-preview:nth-last-child(-n+6)');
        console.log(bookPreviews.length)
        bookPreviews.forEach(function(bookPreview) {
    
          bookPreview.style.display = 'none';
          setTimeout(function() {
            bookPreview.style.display = 'block';
          }, 1000);
        });
  
        offSet += 6;
      });
  }
});
