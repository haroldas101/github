export class Products {
    constructor(name, price, salePrice, category) {
        this.name = name;
        this.price = price;
        this.salePrice = salePrice;
        this.category = category;
    }

    getNameAndPrice() {
        return `${this.name}: €${this.price}`;
    }

    getSalePrice() {
        if (this.salePrice > 0) {
        let discount = Math.round((this.price - this.salePrice) / this.price * 100);
        return `Prekei ${this.name} yra taikoma ${discount}% nuolaida`;
        } else {
        return `Šiuo metu prekei nuolaida netaikoma`;
        }
    }
}