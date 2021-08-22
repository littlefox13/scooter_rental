<template>
    <div>

        <h1 class="mb4">Reports</h1>
        <div class="reports_key">
            <div>
                <button class="btn btn-danger" @click="getReportData(report_types['manager'])">Managers</button>
            </div>

            <div>
                <button class="btn btn-danger" @click="getReportData(report_types['rental_point'])">Rental points</button>
            </div>

            <div>
                <button class="btn btn-danger" @click="getReportData(report_types['scooter'])">Scooters</button>
            </div>

            <div>
                <button class="btn btn-danger" @click="getReportData(report_types['user'])">Users</button>
            </div>
        </div>

        <table class="table">
            <tr>
                <th>
                    id
                </th>
                <th>
                    desc
                </th>
                <th>
                    cost
                </th>
            </tr>

            <tr v-for="(report) in report_data" :key="report.id">
                <td>
                    {{ report.id }}
                </td>
                <td>
                    {{ report.name }}
                </td>
                <td>
                    {{ report.sum }}
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import moment from 'moment';
    const report_type = {
            'manager': 'manager',
            'rental_point': 'rental_point',
            'scooter': 'scooter',
            'user': 'user'
        };
    export default {

        data() {
            return {
                report_types: {},
                report_data: []
            }
        },
        created() {
            this.report_types = report_type;
            console.log(report_type);
            console.log(this.report_types);
            console.log(this.report_types['user']);
        },
        methods: {
            getReportData(type) {
                console.log(type);
                this.axios
                    .get(`/api/reports/${type}`)
                    .then(response => {
                        this.report_data = response.data;
                    })
            }
        }
    }
</script>
