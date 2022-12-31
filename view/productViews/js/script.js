let show = document.getElementById('productType').value;
const onPageload = function () {
  show = document.getElementById('productType').value;
  document.getElementById(show).hidden = false;
  document.getElementById(show).disabled = false;
};
const dropDownChange = function () {
  let e = document.getElementById(show);
  e.hidden = true;
  e.disabled = true;
  show = document.getElementById('productType').value;
  e = document.getElementById(show);
  e.hidden = false;
  e.disabled = false;
}
const validateSku = function (target) {
  console.log(target.target.value);
  fetch("/api/read-product?sku=" + target.target.value)
        .then((response) => response.json())
        .then((json) => {
          setTimeout(() => {
            if (json.hasOwnProperty("sku")) {
              target.target.setCustomValidity("SKU already exists");
                "SKU already exists.";
            } else if (target.target.value === '') {
              target.target.setCustomValidity("Please fill out this field.");
            }
            else {
              target.target.setCustomValidity("");
            }
          }, 300);
        });
};
(function () {
    document.getElementById('productType').addEventListener('change', dropDownChange);
    document.addEventListener("DOMContentLoaded", onPageload);
    document.getElementById('sku').addEventListener('focusout', (target)=>{
      validateSku(target);
    });
})();
