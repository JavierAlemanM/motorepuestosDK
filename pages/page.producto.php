<div class="site">
    <?php require 'components/template/header.php';  ?>
    <br><br><br>
    <div class="site__body">
        <div class="block-split">
            <div class="container">
                <div class="block-split__row row no-gutters">
                    <div class="block-split__item block-split__item-content col-auto">
                        <div class="product product--layout--full">
                            <div class="product__body">
                                <div class="product__card product__card--one"></div>
                                <div class="product__card product__card--two"></div>
                                <div class="product-gallery product-gallery--layout--product-full product__gallery" data-layout="product-full">
                                    <div class="product-gallery__featured">
                                        <div class="owl-carousel">
                                            <a class="image image--type--product" href="assets/images/products/producto.jpg" target="_blank" data-width="700" data-height="700">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </a>
                                            <a class="image image--type--product" href="assets/images/products/producto.jpg" target="_blank" data-width="700" data-height="700">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </a>
                                            <a class="image image--type--product" href="assets/images/products/producto.jpg" target="_blank" data-width="700" data-height="700">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </a>
                                            <a class="image image--type--product" href="assets/images/products/producto.jpg" target="_blank" data-width="700" data-height="700">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-gallery__thumbnails">
                                        <div class="owl-carousel">
                                            <div class="product-gallery__thumbnails-item image image--type--product">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="product-gallery__thumbnails-item image image--type--product">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="product-gallery__thumbnails-item image image--type--product">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="product-gallery__thumbnails-item image image--type--product">
                                                <div class="image__body">
                                                    <img class="image__tag" src="assets/images/products/producto.jpg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product__header">
                                    <h1 id="productName" class="product__title"></h1>
                                </div>
                                <div class="product__main">
                                    <div class="product__excerpt">
                                    Esto es un texto de relleno. A continuación, una descripción del repuesto de moto: es una pieza resistente y duradera, 
                                    fabricada con materiales de alta calidad para soportar las demandas diarias de conducción. Su compatibilidad con el 
                                    modelo y año de la motocicleta asegura un ajuste perfecto y un rendimiento óptimo. Además, mejora las prestaciones 
                                    originales de la motocicleta y su instalación es sencilla. Con resistencia a la corrosión y certificaciones de calidad 
                                    respaldadas por garantía, este repuesto garantiza una experiencia de conducción segura y placentera en cada trayecto.
                                    </div>
                                </div>
                                <div class="product__info">
                                    <div class="product__info-card">
                                        <div class="product__info-body">
                                            <div class="product__prices-stock">
                                                <div class="product__prices">
                                                    <div id="productPrice" class="product__price product__price--current"></div>
                                                </div>
                                                <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__text">
                                                            Disponible
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="In&#x20;Stock"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__meta">
                                                <table>
                                                    <tr>
                                                        <th>Codigo:</th>
                                                        <td id="productCodigo"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marca:</th>
                                                        <td id="productMarca"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Inventario:</th>
                                                        <td id="productInventario"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Categoria
                                                        </th>
                                                        <td id="productCategoria"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="product__actions">
                                            <div class="product__actions-item product__actions-item--quantity">
                                                <div class="input-number">
                                                    <input id="numberProduct" class="input-number__input form-control form-control-lg" 
                                                    type="number" min="1" value="1" />
                                                    <div class="input-number__add"></div>
                                                    <div class="input-number__sub"></div>
                                                </div>

                                                <div class="dtnAddiIntegration">
                                                    <addi-widget  price="250000" ally-slug="motorepuestosdk-ecommerce" ></addi-widget>
                                                </div>
                                                
                                            </div>
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <button class="btn btn-primary btn-lg btn-block" onclick="processAddProduct()" >
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php require 'components/template/footer.php';  ?>
</div>
