
$.ajax({
    url: 'http://api.giphy.com/v1/gifs/search',
    method: 'GET',
    contentType: 'application/json; charset=UTF-8',
    data: {
      q:'random',  
      limit: 50,  
      api_key: 'DNRHC69Et2p4Y2vOofS7q8vvwZ0GlDnd' 
    },
    success: handleResults
  });
  function handleResults(response_body){
  response_body.data.forEach(function(item) {
    var url = item.images.fixed_height_downsampled.url;
    var image = $(document.createElement('img'));
    image.attr('src', url)
    image.appendTo('.photo-container')
  }) 
}

 