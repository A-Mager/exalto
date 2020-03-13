<template>
    <div class="container">
<!--        <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">-->
<!--        <label for="jack">Jack</label>-->
<!--        <input type="checkbox" id="john" value="John" v-model="checkedNames">-->
<!--        <label for="john">John</label>-->
<!--        <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">-->
<!--        <label for="mike">Mike</label>-->
<!--        <br>-->
<!--        <span>Checked names: {{ checkedNames }}</span>-->

        <table id="table" class="table display stripe" style="width:60%;">
            <thead style="background-color:#b51f38">
            <tr>
                <th style="color:#ffffff">Naam </th>
                <th style="color:#ffffff">Nummer</th>
                <th style="color:#ffffff">Type</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ productData }}</td>
                <td>Test</td>
                <td>Test</td>
            </tr>
            </tbody>
            <tfoot style="background-color:#b51f38; color: #ffffff">
            <tr>
                <th style="color:#ffffff">Naam</th>
                <th style="color:#ffffff">Nummer</th>
                <th style="color:#ffffff">Type</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default
    {
        props: ['productData'],
        data() {
            return {

            }
        },
        mounted(){

        }
    }


</script>
