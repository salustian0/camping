export default class Search{
    constructor(data = {}) {
        this.init(data);
        if(!this.verify()){
            console.log("error on search module init");
            return false;
        }
        self = this;
        this.assignSearchActions();
        this.assignPaginationActions();
    }

    init(data){
        this.required = {};
        this.optional = {};
        this.page = 0;
        this.optional.fn_success = false;
        this.optional.fn_error = false;


        this.required.input_search = $(data.required.input_search);
        this.required.btn_search = $(data.required.btn_search);
        this.required.pagination_container = $(data.required.pagination_container);
        this.required.list_container = $(data.required.list_container);
        this.required.el_total_results =  $(data.required.el_total_results);

        if(data.optional){
            this.optional.fn_success = typeof data.optional.fn_success === "function" ? data.optional.fn_success  : false;
            this.optional.fn_error = typeof data.optional.fn_error === "function" ? data.optional.fn_error  : false;
        }

        this.required.search_url = data.required.search_url;
    }
    verify(){
        for(let key in this.required){
            let current = this.required[key];
            if(!current.length){
                return false;
            }
        }
        return true;
    }
    assignSearchActions(){
        //buscando quando a text de busca estiver vazia
        this.required.input_search.on('keyup',function (e){
            let search_text = $(this).val().trim();
            if(search_text === ""){
                self.searchAction();
            }
        });

        //buscando ao clicar no botão de busca
        this.required.btn_search.on('click',function(){
            let search_text = self.required.input_search.val().trim();
            if(search_text !== ""){
                self.searchAction();
            }
        });
    }
    //Ações de estili paginação
    assignPaginationActions(){
        const max_page = (parseInt(self.required.pagination_container.find('.pagination').data('maxPage')) -1 );

        //adicionando classe active ao link clicado
        self.required.pagination_container.on("click",".default-link",function(e){
            e.preventDefault();
            self.required.pagination_container.find(".default-link").parent().removeClass("active");
            self.page = parseInt($(this).data('index'));
            if(self.page > 0 && !self.required.pagination_container.find('.previous-link').is('visible')){
                self.required.pagination_container.find('.previous-link').parent().show();
            }
            if(self.page < max_page && !$('.next-link').is('visible')){
                self.required.pagination_container.find('.next-link').parent().show();
            }
            $(this).parent().addClass('active');
            self.searchAction();
        });

        self.required.pagination_container.on("click",".next-link",function(e){
            e.preventDefault();
            if(self.page < max_page){
                self.page++;
                console.log(self.page * 4);
                self.required.pagination_container.find(".default-link").parent().removeClass('active');
                self.required.pagination_container.find(".default-link").eq(self.page).parent().addClass('active');
                self.required.pagination_container.find('.previous-link').removeAttr('disabled');
                if(self.page == max_page){
                    self.required.pagination_container.find('.next-link').parent().hide();
                }
                self.required.pagination_container.find('.previous-link').parent().show();
            }
            self.searchAction();

        });

        self.required.pagination_container.on('click','.previous-link',function(e){
            e.preventDefault();
            if(self.page > 0){
                self.page--;
                self.required.pagination_container.find(".default-link").parent().removeClass('active');
                self.required.pagination_container.find(".default-link").eq(self.page).parent().addClass('active');
                self.required.pagination_container.find('.next-link').removeAttr('disabled');
                if(self.page == 0){
                    self.required.pagination_container.find('.previous-link').parent().hide();
                }
                self.required.pagination_container.find('.next-link').parent().show();
            }
            self.searchAction();
        });

    }
    searchAction(){
        //verificando se o administrador esta logado
        verifySession(function(){
            let search_text = self.required.input_search.val().trim();

            $('#btn-delete').attr('disabled',true)
            $('#btn-edit').attr('disabled',true);

            $.ajax({
                method: "POST",
                url: self.required.search_url,
                dataType: 'json',
                data: {'search': search_text,'page': self.page},
                success: typeof self.optional.fn_success === "function" ? self.optional.fn_success: function(resp){
                    if(resp !== false){
                        if(typeof resp.pagination !== undefined){
                            self.required.pagination_container.html(resp.pagination);
                        }
                        if(typeof resp.table !== undefined){
                            self.required.list_container.html(resp.table);
                        }
                        if(typeof resp.total_results !== undefined){
                            self.required.el_total_results.html(resp.total_results);
                        }
                    }
                    else
                    {
                        self.required.el_total_results.html("0");
                        self.required.list_container.html("<div class='alert alert-info'>Nenhum resultado retornado</div>");
                        self.required.pagination_container.html("");
                    }
                },
                error: typeof self.optional.fn_error === "function" ? self.optional.fn_error: function(err){
                    console.log(err);
                    alert("Houve um erro durante a tentativa de pesquisa, por favor tente novamente mais tarde.");
                }
            });
        });
    }
}
