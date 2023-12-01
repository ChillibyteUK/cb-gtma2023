$(document).ready(function() {
    let term = ''; // Initialize term
    let source = ''; // Initialize source
    const termList = [];
  
    function slugify(str) {
      return String(str)
        .normalize('NFKD') // split accented characters into their base characters and diacritical marks
        .replace(/[\u0300-\u036f]/g, '') // remove all the accents, which happen to be all in the \u03xx UNICODE block.
        .trim() // trim leading or trailing whitespace
        .toLowerCase() // convert to lowercase
        .replace(/&amp;/g,'')
        .replace(/[^a-z0-9 -]/g, '') // remove non-alphanumeric characters
        .replace(/\s+/g, '-') // replace spaces with hyphens
        .replace(/-+/g, '-'); // remove consecutive hyphens
    }

    // Load the data.json file
    // $.getJSON('/wp-content/themes/cb-gtma2023/js/test-data.json', function(data) {
    $.getJSON('/wp-content/themes/cb-gtma2023/search-data.php', function(data) {
      data.forEach(item => {
        const categories = item.category;
        const suppliers = item.supplier;
        const tags = item.tag;
  
        termList.push(...categories.map(term => ({ term, source: 'category' })));
        termList.push(...suppliers.map(term => ({ term, source: 'supplier' })));
        termList.push(...tags.map(term => ({ term, source: 'tag' })));
      });
  

      // Initialize the autocomplete
      $('#searchInput').autocomplete({
        source: function(request, response) {
          const termRegex = new RegExp($.ui.autocomplete.escapeRegex(request.term), 'i');
          const filteredTerms = termList.filter(item => termRegex.test(item.term));
          const matchingSources = filteredTerms.reduce((sources, term) => {
            sources.add(term.source);
            return sources;
          }, new Set());
          const limitedTerms = [];
          matchingSources.forEach(source => {
            const termsBySource = filteredTerms.filter(term => term.source === source);
            limitedTerms.push(...termsBySource.slice(0, 3));
          });
          response(limitedTerms.map(item => ({ value: item.term, source: item.source })));
        },
        select: function(event, ui) {
          term = ui.item.value.replace(/&amp;/g,'&'); // Update term
          // term = ui.item.value; // Update term
          source = ui.item.source; // Update source
          $('#searchInput').val(term);
          $('#sourceInput').val(source);
          executeSearch(source, term);
          return false; // Prevent the default behavior
        },
        focus: function(event, ui) {
          const term = ui.item.value;
          const source = ui.item.source;
          var strippedTerm = term.replace(/&amp;/g, '&');

          $('#searchInput').val(strippedTerm);
          $('#sourceInput').val(source);
          return false; // Prevent the default behavior
        }
      }).autocomplete('instance')._renderItem = function(ul, item) {
        const currentTerm = term || '';
        const regex = new RegExp(`(${currentTerm})`, 'gi');
        const highlightedTerm = item.value.replace(regex, '<strong>$1</strong>');
        return $('<li>')
          .append($('<div>').html(`${item.source}: ${highlightedTerm}`))
          .appendTo(ul);
      };
    });
  

    function getSlugByKey(key) {
      return new Promise(function(resolve, reject) {
          if (slugList.length === 0) {
              // If slugList is empty, fetch the data using $.getJSON
              $.getJSON('/wp-content/themes/cb-gtma2023/search-slugs.php', function(data) {
                  slugList = data;
                  resolve(findSlug(key));
              });
          } else {
              // If slugList is already populated, directly find the value
              resolve(findSlug(key));
          }
      });
  }
  
  function findSlug(key) {
      // Iterate through the array to find the corresponding value
      for (var i = 0; i < slugList.length; i++) {
          var entry = slugList[i];
          var entryKey = Object.keys(entry)[0]; // Assuming each entry has only one key-value pair
  
          if (entryKey === key) {
              return entry[entryKey];
          }
      }
  
      // Return null if the key is not found
      return null;
  }

    // Handle the Go button click event
    $('#go').click(function() {
      const inputTerm = $('#searchInput').val();
      if (inputTerm !== '') {
        term = inputTerm; // Update term with the inputTerm value
        executeSearch(source, term);
      } else {
        executeSearch('', term); // Display only the term without source
      }
    });
  
    function executeSearch(source, term) {
      // const query = source !== '' ? `${source}: ${term}` : term;
      // $('#query').text(query);
      // console.log('Query:', query);
      // category: /supplier/additive-manufacturing/
      // tag: /tags/2d-3d/
      // supplier: /suppliers/robev-engineering-ltd/
      console.log(term);
      if (source !== '' && source === 'tag') {
        var url = '/tags/' + slugify(term) + '/';
        window.location.href = url;
      }
      else if (source !== '' && source === 'category') {
        var url = '/supplier/' + slugify(term) + '/';
        window.location.href = url;
      }
      else {
        // this won't work after the SEO title changes
        // var url = '/suppliers/' + slugify(term) + '/';

        async function slugIt() {
          var slug = await getSlugByKey(term);
          console.log(slug);
          var url = '/suppliers/' + slug + '/';
          window.location.href = url;
        }

        slugIt();

      }
      // console.log('URL: ' + url);
      
    }
  
    // Handle input in the search field
    $('#searchInput').on('input', function() {
      term = $(this).val().trim(); // Update term
      source = ''; // Unset source
    });
  });
  
  