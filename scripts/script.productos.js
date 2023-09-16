let filters = {
    "productActive": false,
    "productFilter": null,
    "categorieActive": false,
    "categorieFilter": null
}
const processPagination = (page) =>{
    console.log(page);
}

function prueba(page) {
    console.log('hola onclick '+ page);
}

const renderCategories = (categorias) =>{
    var categoriasHTML = $.map(categorias, function(categoria) {
        return `
        <label class="filter-list__item">
			<span class="input-check filter-list__input">
			    <span class="input-check__body">
					<input class="input-check__input" type="checkbox">
					<span class="input-check__box"></span>
					<span class="input-check__icon">
						<svg width="9px" height="7px">
							<path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"></path>
						</svg>
					</span>
				</span>
			</span>
			<span class="filter-list__title">${categoria.categoria}</span>
		</label>
        `;
    });
    $('#page_categories_list').html('');
    $('#page_categories_list').html(categoriasHTML.join(''));
}

const handleCategorySelection = () => {
    const checkboxes = $('#page_categories_list .input-check__input');
    checkboxes.on('change', (event) => {
        const checkbox = $(event.target);
        if (checkbox.prop('checked')) {
            checkboxes.each((index, cb) => {
                if (cb !== checkbox[0]) {
                    $(cb).prop('checked', false);
                }
            });
            const categoriaSeleccionada = checkbox.closest('.filter-list__item').find('.filter-list__title').text();
            filters.categorieActive= true;
            filters.categorieFilter=categoriaSeleccionada;
            filters.productActive = false;
            filters.productFilter = false;
        }
    });
};
const clearCategorySelection = () => {
    $('#page_categories_list .input-check__input').prop('checked', false);
    filters.categorieActive= false;
    filters.categorieFilter=null;
};

const renderListProducts = (productos) =>{
    var productosHTML = $.map(productos, function(producto) {
        return `
        <div class="products-list__item">
            <div class="product-card">
                <div class="product-card__image">
                    <div class="image image--type--product">
                        <a href="product-full.html" class="image__body">
                            <img class="image__tag" src="assets/images/products/producto.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="product-card__info">
                    <div class="product-card__meta"><span class="product-card__meta-title">Ref: </span>${producto.codigo}</div>
                    <div class="product-card__name">
                        <div>
                            <div class="product-card__badges">
                            </div><a href="product-full.html">${producto.producto}</a>
                        </div>
                    </div>
                    <div class="product-card__features">
                        <ul>
                            <li>categoria: ${producto.categoria}</li>
                            <li>marca: sin marca</li>
                            <li>unidades: ${producto.inventario}</li>
                        </ul>
                    </div>
                </div>
                <div class="product-card__footer">
                    <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">
                        ${monedaCop(producto.precio)}
                        </div>
                    </div>
                    <button class="product-card__addtocart-icon" type="button" onclick="selectProduct('${producto.codigo}')" aria-label="Add to cart">
                        <svg width="20" height="20"> 
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="15" cy="17" r="2"></circle>
                            <path   d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                    V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                    C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z">
                            </path>
                        </svg>
                    </button> 
                    <button class="product-card__addtocart-full" onclick="selectProduct('${producto.codigo}')" type="button">Agregar</button> 
                </div>
            </div>
        </div>
        `;
    });
    $('#page_products_list').html('');
    $('#page_products_list').html(productosHTML.join(''));
}

const scrollToTop = () => {
    const scrollToTopDuration = 500; // Duración de la animación en milisegundos
    const scrollStep = -window.scrollY / (scrollToTopDuration / 15);
    const scrollInterval = setInterval(() => {
      if (window.scrollY !== 0) {
        window.scrollBy(0, scrollStep);
      } else {
        clearInterval(scrollInterval);
      }
    }, 15);
}

const renderBtnsPagitation = (page, pages)=>{
    let pageback =page-1;
    let pageNext =page+1;
    let pageNextPlus =page+2;
    let btnsPagination = '';
    let btnLeft = '';
    let btnRight = '';
    let btnNext ='';
    let btnNextPlus ='';
    let btnPages = '';
    let btnSeparator = 
    '<li class="page-item page-item--dots">'+
        '<div class="pagination__dots"></div>'+
    '</li>';
    if (page==1) {
        btnLeft =
        '<li class="page-item disabled">'+
            '<a class="page-link page-link--with-arrow" href="#" aria-label="Previous">'+
                '<span class="page-link__arrow page-link__arrow--left" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>'+
                    '</svg>'+
                '</span>'+
            '</a>'+
        '</li>';
    }else{
        btnLeft =
        '<li class="page-item ">'+
            '<a class="page-link page-link--with-arrow" href="#" aria-label="Previous" onclick="btnSelectPage('+pageback+')">'+
                '<span class="page-link__arrow page-link__arrow--left" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>'+
                    '</svg>'+
                '</span>'+
            '</a>'+
        '</li>';
    }
    if (page>=pages) {
        btnRight =
        '<li class="page-item disabled">'+
            '<div class="page-link page-link--with-arrow"  aria-label="Next">'+
                '<span class="page-link__arrow page-link__arrow--right" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>'+
                    '</svg>'+
                '</span>'+
            '</div>'+
        '</li>';
    }else{
        btnRight =
        '<li class="page-item">'+
            '<div class="page-link page-link--with-arrow"  aria-label="Next" onclick="btnSelectPage('+pageNext+')" >'+
                '<span class="page-link__arrow page-link__arrow--right" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>'+
                    '</svg>'+
                '</span>'+
            '</div>'+
        '</li>';
    }

    if (pageNext<pages) {
        btnNext='<li class="page-item "><div class="page-link" onclick="btnSelectPage('+pageNext+')" >'+pageNext+'</div></li>';
    }

    if (pageNextPlus>pageNext && pageNextPlus<pages) {
        btnNextPlus='<li class="page-item "  ><div class="page-link" onclick="btnSelectPage('+pageNextPlus+')" >'+pageNextPlus+'</div></li>';
    }

    if (pages>=pageNextPlus){
        btnPages = '<li class="page-item"><div class="page-link" onclick="btnSelectPage('+pages+')">'+pages+'</div></li>';
    }

    console.log
    btnsPagination = 
    btnLeft+
    btnSeparator+
    '<li class="page-item active"><div class="page-link" >'+page+'</div></a></li>'+
    btnNext+
    btnNextPlus+
	btnSeparator+
	btnPages+
	btnRight;
    $('#btns_pagination').html(btnsPagination);
}




const managerForm = () =>{
    formProductsWeb();
    formProductsMovil();
}

const selectProduct = (x) =>{
    window.location.href = "producto?id="+x;
}

const formProductsWeb  = () =>{
    $("#frm_product_search_web").submit(function(event) {
        event.preventDefault();
        let product = $("#input_product_search_web").val();
        filters.productActive = true;
        filters.productFilter = product;
        filters.categorieActive = false;
        filters.categorieFilter= null;
        productManager.setCurrentPage(1);
        processGetProducts();
    });
}
const formProductsMovil = () =>{
    $("#frm_product_search_movil").submit(function(event) {
        console.log('entro movil');
        event.preventDefault();
        let product = $("#input_product_search_movil").val();
        filters.productActive = true;
        filters.productFilter = product;
        filters.categorieActive = false;
        filters.categorieFilter= null;
        productManager.setCurrentPage(1);
        processGetProducts();
    });
}



const productsAll =  async () =>{
    try {
        const result = await productManager.getProductsAll();
        renderListProducts(result.products);
        renderBtnsPagitation(result.currentPage, result.totalPages)
    } catch (error) {
        console.error('Error:', error);
    }
}

const productsFilterCategory =  async (category) =>{
    try {
        const result = await productManager.getProductsFilterCategory(category);   
        renderListProducts(result.products);
        renderBtnsPagitation(result.currentPage, result.totalPages)
    } catch (error) {
        console.error('Error:', error);
    }
}

const productsFilterProducts =  async (product) =>{
    try {
        const result = await productManager.getProductsFilterProducts(product);   
        renderListProducts(result.products);
        renderBtnsPagitation(result.currentPage, result.totalPages)
    } catch (error) {
        console.error('Error:', error);
    }
}


const productsFilterAll =  async (category, product) =>{
    try {
        const result = await productManager.getProductsFilterAll(category, product);   
        renderListProducts(result.products);
        renderBtnsPagitation(result.currentPage, result.totalPages)
    } catch (error) {
        console.error('Error:', error);
    }
}

const getCategories =  async () =>{
    try {
        const result = await productManager.getCategories();
        renderCategories(result.categories);
        handleCategorySelection();
    } catch (error) {
        console.error('Error:', error);
    }
}

const clearFilter = () =>{
    clearCategorySelection();
    filters.categorieActive= false;
    filters.categorieFilter= null;
    filters.productActive = false;
    filters.productFilter = null;
    $(".reset_input_search_product").val("");
    processGetProducts();
}

const btnSelectPage = (page) =>{
    productManager.setCurrentPage(page);
    processGetProducts();
    scrollToTop();
}

const processGetProducts = () =>{
    if (filters.productActive) {
        productsFilterProducts(filters.productFilter);
    }else if (filters.categorieActive) {
        productsFilterCategory(filters.categorieFilter);
    }else{
        productsAll();
    }
}

const processInit = ()=>{
    managerForm();
    getCategories();
    processGetProducts();
}

processInit();













  
  
  
  