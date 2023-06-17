$(document).ready(function() {
    // Carregar categorias do banco de dados
    $.ajax({
        url: 'carregar_categorias.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.length > 0) {
                var categoryCloud = $('.category-cloud');

                // Gerar nuvem de palavras
                data.forEach(function(category) {
                    var categoryElement = $('<span class="category" data-id="' + category.cod + '">' + category.nome + '</span>');
                    categoryElement.click(toggleCategory);
                    categoryCloud.append(categoryElement);
                });
            }
        },
        error: function() {
            console.log('Erro ao carregar categorias do banco de dados');
        }
    });

    // Função para alternar a seleção da categoria
    function toggleCategory() {
        $(this).toggleClass('selected');

        if ($(this).hasClass('selected')) {
            $(this).css('color', 'green');
        } else {
            $(this).css('color', 'black');
        }

        var selectedCategories = $('.category-cloud .category.selected');
        $('#finishBtn').toggle(selectedCategories.length > 0);
    }

    // Finalizar seleção de categorias
    $('#finishBtn').click(function() {
        var selectedCategories = $('.category-cloud .category.selected');

        var categoryIds = [];
        selectedCategories.each(function() {
            categoryIds.push($(this).data('id'));
        });

        // Enviar categorias selecionadas para o backend
        $.ajax({
            url: 'adicionar_categorias.php',
            method: 'POST',
            data: { categories: categoryIds },
            success: function() {
                window.location.href = 'dashboard.php';
            },
            error: function() {
                console.log('Erro ao adicionar categorias');
            }
        });
    });
});
