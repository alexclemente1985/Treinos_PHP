// Script irá pegar o componente com classe "ativo" e irá trocar o status do registro por meio dos valores obtidos das tags data-id e data-status
// -> depende do JQuery estar carregado
document.addEventListener("DOMContentLoaded", function(){
    $(function(){
        $('.ativo').click(function(e){
            e.preventDefault(); //evita o comportamento padrão do link
            let ativo =$(this).data('status');
            let id = $(this).data("id");
            let urlBase = $(this).data("url");

            // fará uma requisição para o php para alterar os dados do ativo
            $.ajax({
                type: "POST",
                url: urlBase,
                data: "id="+id+"&ativo="+ativo,
                success: function(){
                    location.reload();
                }
            })
        })
    })
})