function urlDir(url) {
    switch (url) {
        case null:
            window.history.back();
            break;
        case false:
            location.reload();
            break;
        default:
            window.location.href = url;
            break;
    }
}
function getUrlId() {
    const urlObj = new URL(window.location.href);
    return urlObj.searchParams.get('id');
}

class APIHandler {
    constructor(apiUrl) {
        this.apiUrl = apiUrl;
    }
    async fetchData(endpoint, formData, callback) {
        const urlSearchParams = new URLSearchParams(formData);
        const response = await fetch(
            `${this.apiUrl}${endpoint}?${urlSearchParams.toString()}`
        );
        const data = await response.json();
        callback(data);
    }
    async postData(endpoint, formData, callback) {
        const response = await fetch(`${this.apiUrl}${endpoint}`, {
            method: "POST",
            body: formData,
        });
        const data = await response.json();
        callback(data);
    }
    async putData(endpoint, formData, callback) {
        const response = await fetch(`${this.apiUrl}${endpoint}`, {
            method: "PUT",
            body: formData,
        });
        const data = await response.json();
        callback(data);
    }
    async deleteData(endpoint, callback) {
        const response = await fetch(`${this.apiUrl}${endpoint}`, {
            method: "DELETE",
        });
        const data = await response.json();
        callback(data);
    }
}
const apiHandler = new APIHandler("http://localhost/server/PRUEBAPHP/API/");

class FormManager {
    constructor(inputIds) {
        this.inputs = inputIds.map((id) => document.getElementById(id));
    }
    getFormData() {
        const formData = new FormData();
        this.inputs.forEach((input) => {
            if (input.type === "file") {
                formData.append(input.name, input.files[0]);
            } else {
                formData.append(input.name, input.value);
            }
        });
        return formData;
    }
    clearForm() {
        this.inputs.forEach((input) => {
            if (input.type === "file") {
                input.value = null;
            } else {
                input.value = "";
            }
        });
    }
}

const sessionStatus = () => {
    $.ajax({
        url: "php/session.php",
        method: "GET",
        dataType: "json",
    }).done(function (res) {
        let session = res.session_estatus;
        //session == false ?urlDir('login'):null;
    });
};

const monedaCop = (numero) => {
    numero = parseInt(numero); // Convertir el número a entero
    numeroFormateado = numero.toLocaleString("es-CO", {
        style: "currency",
        currency: "COP",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }); // Formatear el número como moneda en pesos colombianos sin decimales
    return numeroFormateado;
};


class ProductManager {
    constructor(Products, Categories) {
        this.resultsPerPage = 20; // Número de resultados por página
        this.currentPage = 1; // Página actual
        this.filterProduct = false; // Filtro de producto solicitado
        this.filterCategory = false; // Filtro de categoría solicitado
        this.filterCategoryProduct = false; // Filtro de producto solicitado
        this.filterCode = false; // Filtro de codigo solicitado
        this.resultsData = []; // Resultado de la petición fetch
        this.resultsProducts = []; // Almacena resultado de todos los filtros
        this.totalPages = 0; // Cantidad total de páginas
        this.urlProducts = Products; // URL de la API
        this.urlCategories = Categories;
    }

    async getCategories() {
        try {
            const response = await fetch(this.urlCategories);
            const categories = await response.json();
            return {
                categories,
            };
        } catch (error) {
            console.error("Error fetching products:", error);
            return {
                products: [],
                totalPages: 0,
            };
        }
    }

    async getProductsAll() {
        try {
            const response = await fetch(this.urlProducts);
            const data = await response.json();
            this.resultsData = Array.isArray(data) ? data : [];
            this.totalPages = Math.ceil(
                this.resultsData.length / this.resultsPerPage
            );
            const startIndex = (this.currentPage - 1) * this.resultsPerPage;
            const endIndex = startIndex + this.resultsPerPage;
            const products = this.resultsData.slice(startIndex, endIndex);
            return {
                currentPage: this.currentPage,
                products,
                totalPages: this.totalPages,
            };
        } catch (error) {
            console.error("Error fetching products:", error);
            return {
                products: [],
                totalPages: 0,
            };
        }
    }

    getCurrentPage() {
        return this.currentPage;
    }

    setCurrentPage(page) {
        return (this.currentPage = page);
    }

    async getProductsFilterCategory(category) {
        try {
            const response = await fetch(this.urlProducts);
            const data = await response.json();
            this.resultsData = Array.isArray(data) ? data : [];

            this.resultsProducts = this.resultsData.filter((product) => {
                return product.categoria === category;
            });

            this.totalPages = Math.ceil(
                this.resultsProducts.length / this.resultsPerPage
            );

            const startIndex = (this.currentPage - 1) * this.resultsPerPage;
            const endIndex = startIndex + this.resultsPerPage;
            const products = this.resultsProducts.slice(startIndex, endIndex);

            return {
                currentPage: this.currentPage,
                products,
                totalPages: this.totalPages,
            };
        } catch (error) {
            console.error("Error fetching products:", error);
            return {
                products: [],
                totalPages: 0,
            };
        }
    }

    async getProductsFilterProducts(productName) {
        try {
            const response = await fetch(this.urlProducts);
            const data = await response.json();
            this.resultsData = Array.isArray(data) ? data : [];
            const regex = new RegExp(productName, "i");
            this.resultsProducts = this.resultsData.filter((product) => {
                return regex.test(product.producto);
            });

            this.totalPages = Math.ceil(
                this.resultsProducts.length / this.resultsPerPage
            );

            const startIndex = (this.currentPage - 1) * this.resultsPerPage;
            const endIndex = startIndex + this.resultsPerPage;
            const products = this.resultsProducts.slice(startIndex, endIndex);

            return {
                currentPage: this.currentPage,
                products,
                totalPages: this.totalPages,
            };
        } catch (error) {
            console.error("Error fetching products:", error);
            return {
                products: [],
                totalPages: 0,
            };
        }
    }

    async getProductsFilterAll(category, productName) {
        try {
            // Filtrar por categoría
            const categoryFiltered = await this.getProductsFilterCategory(
                category
            );

            // Filtrar por producto dentro del resultado anterior
            this.resultsProducts = categoryFiltered.products;
            const regex = new RegExp(productName, "i");
            this.resultsProducts = this.resultsProducts.filter((product) => {
                return regex.test(product.producto);
            });

            this.totalPages = Math.ceil(
                this.resultsProducts.length / this.resultsPerPage
            );

            const startIndex = (this.currentPage - 1) * this.resultsPerPage;
            const endIndex = startIndex + this.resultsPerPage;
            const products = this.resultsProducts.slice(startIndex, endIndex);

            return {
                currentPage: this.currentPage,
                products,
                totalPages: this.totalPages,
            };
        } catch (error) {
            console.error("Error fetching products:", error);
            return {
                products: [],
                totalPages: 0,
            };
        }
    }



    async getProductByCode(code) {
        try {
            const response = await fetch(this.urlProducts);
            const data = await response.json();
            this.resultsData = Array.isArray(data) ? data : [];
            const product = this.resultsData.find((product) => {
                return product.codigo === code;
            });

            return product ? product : null;
        } catch (error) {
            console.error("Error fetching products:", error);
            return null;
        }
    }





}

const urlProducts = 'db/productos.json';
const urlCategories = 'db/categorias.json';
const productManager = new ProductManager(urlProducts,urlCategories);