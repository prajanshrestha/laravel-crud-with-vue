require("./bootstrap");

import axios from "axios";
import Vue from "vue/dist/vue.js";

Vue.component("modal", {
    template: "#modal-template",
});

new Vue({
    el: "#app",
    data() {
        return {
            newItem: {
                name: "",
                age: "",
                profession: "",
            },
            hasError: true,
            items: [],
            showModal: false,
            e_id: "",
            e_name: "",
            e_age: "",
            e_profession: "",
        };
    },
    methods: {
        createItem: function () {
            var input = this.newItem;
            var that = this;
            // form validation
            if (
                input["name"] == "" ||
                input["age"] == "" ||
                input["profession"] == ""
            ) {
                alert("Please fill all the fields");
            } else {
                axios.post("/storeItem", input).then(function (response) {
                    that.newItem = { name: "", age: "", profession: "" };
                    that.getItems();
                });
            }
        },
        getItems: function () {
            var that = this;
            axios.get("/getItems").then(function (response) {
                that.items = response.data;
            });
        },
        deleteItem: function (item) {
            axios.post("/deleteItem/" + item.id).then(function (response) {
                that.getItems();
            });
        },
        setVal: function (val_id, val_name, val_age, val_profession) {
            this.e_id = val_id;
            this.e_name = val_name;
            this.e_age = val_age;
            this.e_profession = val_profession;
        },
        editItem: function () {
            var that = this;
            var i_val = document.getElementById("e_id");
            var n_val = document.getElementById("e_name");
            var a_val = document.getElementById("e_age");
            var p_val = document.getElementById("e_profession");

            axios
                .post("/editItem/" + i_val.value, {
                    val1: n_val.value,
                    val2: a_val.value,
                    val3: p_val.value,
                })
                .then(function (response) {
                    that.getItems();
                    that.showModal = false;
                });
        },
    },
    mounted: function () {
        this.getItems();
    },
});
