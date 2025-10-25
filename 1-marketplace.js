function Cart() {
    this.itemGroups = [];
    this.addItemGroup = function(itemGroup) {
        this.itemGroups.push(itemGroup);
    }

    this.getTotalAmount = function() {
        let amount = 0;
        for (let i = 0; i < this.itemGroups.length; i++) {
            let group = this.itemGroups[i];
            amount += group.price * group.numberOfItems;
        }
        return amount;
    }

    this.showTotalAmount = function() {
        if (this.itemGroups.length == 0) {
            document.write("<p>You have 0 item, for a total amount of $0.00, in your cart!</p>");
        } else {
            let total = this.getTotalAmount();
            let totalWithTax = total * 1.15;
            document.write("<p>You have " + this.itemGroups.length + " items in your cart, for a total amount of $" + total.toFixed(2) + ". With taxes, this is $" + totalWithTax.toFixed(2) + ".</p>");
        }
    }
}

function ItemGroup(name, price, numberOfItems) {
    this.name = name;
    this.price = price;
    this.numberOfItems = numberOfItems;
}

document.write("<h2> 1) Creating the cart </h2>");
let my_cart = new Cart();
my_cart.showTotalAmount();
document.write("<h2> 2) Adding 15 pants at 10.05$ each to the cart! </h2>");
let pants = new ItemGroup("pants", 10.05, 15);
my_cart.addItemGroup(pants);
my_cart.showTotalAmount();
document.write("<h2> 3) Adding 1 coat at 99.99$ to the cart! </h2>");
let coat = new ItemGroup("coat", 99.99, 1);
my_cart.addItemGroup(coat);
my_cart.showTotalAmount();
