<template>
    <div class="container">
        <table>
            <tr>
                <th>Color</th>
                <th>Votes</th>
            </tr>
            <tr v-for="item in items" v-bind:key="item.id">
                <td>
                    <a href="#" @click.prevent="getVotes(item.color)">{{ item.color }}</a>
                </td>
                <td>
                    {{ item.votes }}
                </td>
            </tr>
            <tr>
                <th><a href="#" @click.prevent="getTotal">TOTAL</a></th>
                <th>{{ total }}</th>
            </tr>


        </table>
    </div>
</template>

<script>
    export default {
        props: ['colors'],
        created: function() {
            for (var i = 0; i < this.colors.length; i++ ) {
                this.items.push(
                    {
                        'id' : this.colors[i].id,
                        'color' : this.colors[i].color,
                        'votes' : null
                    }
                );
            }

        },
        data: function(){
            return {
                items: [],
                total: 0
            }
        },
        methods: {
            getVotes(index) {
                axios.get('/colors-voters/public/votes/' + index)
                    .then(response => {

                        let obj = this.items.find(o => o.color === index);
                        obj.votes = response.data;
                    });
            },
            getTotal() {
                this.total = 0;
                for (var i = 0; i < this.items.length; i++ ) {
                    if (this.items[i].votes) {
                        this.total += this.items[i].votes;
                    }
                }

            }
        }
    }
</script>
