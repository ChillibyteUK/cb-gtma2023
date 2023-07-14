$(document).ready(function() {
    let term = ''; // Initialize term
    let source = ''; // Initialize source
    const termList = [];
  
    // Load the data.json file
    $.getJSON('/wp-content/themes/cb-gtma2023/js/test-data.json', function(data) {
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
          term = ui.item.value; // Update term
          source = ui.item.source; // Update source
          $('#searchInput').val(term);
          $('#sourceInput').val(source);
          executeSearch(source, term);
          return false; // Prevent the default behavior
        },
        focus: function(event, ui) {
          const term = ui.item.value;
          const source = ui.item.source;
          $('#searchInput').val(term);
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
      const query = source !== '' ? `${source}: ${term}` : term;
      $('#query').text(query);
      console.log('Query:', query);
    }
  
    // Handle input in the search field
    $('#searchInput').on('input', function() {
      term = $(this).val().trim(); // Update term
      source = ''; // Unset source
    });
  });
  