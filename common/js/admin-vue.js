(function ($) {
    // console.log(sfxdonate_plugin_url);
    // console.log(sfxdonate_process_admin_url);
    console.log("admin-vue");
    var _body = $("body");


    /* 
            Vue.component('', {
                data: function () {
                    return {};
                },
                props: [],
                template: ``,
                created() {},
                computed: {},
                mounted() {},
                watch: {},
                methods: {},
            });
     */




    Vue.component('vue-element', {
        data: function () {
            return {
                "name": "",
                "added": [],
            };
        },
        props: ["inputId", "inputName", "placeholder", "load","addTitle"],
        template: `
        <div>

        <input type="text" :id="inputId" :placeholder="placeholder" v-model="name" @keydown.enter.prevent="add" class="sfxinput">

        <button type="button" class="button button-primary sfx-add-button" @click.prevent="add">{{addTitle}}</button>
        <br>

        <div id="sfx-elments" class="sortable">
        <div v-for="(v,k) in added" class="sfxelement">

        {{v}}


        <input type="hidden" :value="v" :name="inputName">

        <button type="button" class="button button-danger float-right" @click="remove(k)">x</button>

        <div class="clearfix"></div>
        </div>
        </div>




        </div>
        `,
        created() {
            if (typeof window[this.load] == "undefined") return;

            // console.log(window[this.load]);

            this.added = JSON.parse(window[this.load]);


        },
        computed: {},
        mounted() {},
        watch: {},
        methods: {
            add(e) {
                // e.preventDefault();

                if (!$.trim(this.name)) return;
/* 
                this.added.push({
                    "name": this.name
                });
 */
                this.added.push(this.name);

                // console.log(this.name);
                // console.log(this.added);


                this.name = "";
            },
            remove(k) {
                // console.log(k);
                this.added.splice(k, 1);


            }


        },
    });



























    //---------

    var gen = $(".vue-gen");
    // console.log(vues.length);
    if (gen.length) {
        for (var index = 0; index < gen.length; index++) {
            // console.log(vues[index]);

            new Vue({
                el: gen[index],
                data: {
                    // message: "hello " + index,
                    loading: false,
                },
                created: function () {
                    this.loading = true;
                },
            });

        }
    }


























    //---------
    /* 
        var gen = $(".vue-gen");
        // console.log(vues.length);
        if (gen.length) {
            for (var index = 0; index < gen.length; index++) {
                // console.log(vues[index]);

                new Vue({
                    el: gen[index],
                    data: {
                        // message: "hello " + index,
                        loading: false,
                    },
                    created: function () {
                        this.loading = true;
                    },
                });

            }
        }
     */


})(jQuery);