$(document).ready(function() {
  let term = '';
  let source = '';
  const termList = [];

  function slugify(str) {
    return String(str)
      .normalize('NFKD')
      .replace(/[\u0300-\u036f]/g, '')
      .trim()
      .toLowerCase()
      .replace(/&amp;/g, '')
      .replace(/[^a-z0-9 -]/g, '')
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-');
  }

  $.getJSON('/wp-content/themes/cb-gtma2023/search-data.php',
    function(data) {
      data.forEach(item => {
        const categories = item.category;
        const suppliers = item.supplier;
        const tags = item.tag;

        termList.push(...suppliers.map(term => ({
          term,
          source: 'supplier'
        })));
        termList.push(...categories.map(term => ({
          term,
          source: 'category'
        })));
        termList.push(...tags.map(term => ({
          term,
          source: 'tag'
        })));
      });

      $('#searchInput').autocomplete({
        source: function(request, response) {
          const termRegex =
            new RegExp($.ui.autocomplete
              .escapeRegex(request.term),
              'i');
          const filteredTerms = termList
            .filter(item => termRegex.test(
              item.term));
          const matchingSources = new Set(
            filteredTerms.map(term =>
              term.source));
          const limitedTerms = [];

          matchingSources.forEach(source => {
            limitedTerms.push(...
              filteredTerms
              .filter(
                term => term
                .source ===
                source)
              .slice(0, 3)
            );
          });

          response(limitedTerms.map(item => ({
            value: item
              .term,
            source: item
              .source
          })));
        },
        select: function(event, ui) {
          term = ui.item.value.replace(
            /&amp;/g, '&');
          source = ui.item.source;
          $('#searchInput').val(term);
          $('#sourceInput').val(source);
          executeSearch(source, term);
          return false;
        }
      }).autocomplete('instance')._renderItem = function(
        ul, item) {
        const currentTerm = term || '';
        const regex = new RegExp(`(${currentTerm})`,
          'gi');
        const highlightedTerm = item.value.replace(
          regex, '<strong>$1</strong>');
        return $('<li>')
          .append($('<div>').html(
            `${item.source}: ${highlightedTerm}`
          ))
          .appendTo(ul);
      };
  });

  function getSlugByKey(companyName) {
    for (var i = 0; i < slugList.length; i++) {
      var companyObj = slugList[i];
      if (companyObj.hasOwnProperty(companyName)) {
        return companyObj[companyName];
      }
    }
    return null;
  }

  $('#go').click(function() {
    const inputTerm = $('#searchInput').val();
    if (inputTerm !== '') {
      term = inputTerm;
      executeSearch(source, term);
    } else {
      executeSearch('', term);
    }
  });

  function executeSearch(source, term) {
    var exactMatch = false;

    $('#go-spinner').show();
    $('#go-text').hide();

    for (var i = 0; i < termList.length; i++) {
      if (termList[i].term === term) {
        exactMatch = true;
        break;
      }
    }

    if (exactMatch) {
      var url = '';

      if (source !== '' && source === 'tag') {
        url = '/tags/' + slugify(term) + '/';
      } else if (source !== '' && source === 'category') {
        url = '/types/' + slugify(term) + '/';
      } else {
        var slug = getSlugByKey(term);
        if (slug == null) {
          url = '/types/' + slugify(term) + '/';
        }
        else {
          url = '/suppliers/' + slug + '/';
        }
      }
      window.location.href = url;
    } else {
      window.location.href = '/?s=' + encodeURIComponent(term);
    }
  }

  $('#searchInput').on('input', function() {
    term = $(this).val().trim();
    source = '';
  });
});
