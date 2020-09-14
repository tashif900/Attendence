<template>
    <div class="container">

        <!-- Index view -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title col-md-11">Attendences</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="indexTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" >Name</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" >Check In</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" >Check Out</th>
                                                <th>Working Hours</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr role="row" class="odd" v-for="attendence in attendences">
                                                <td>{{attendence.user_name}}</td>
                                                <td>{{attendence.check_in|myDate}}</td>
                                                <td>{{attendence.check_out|myDate}}</td>
                                                <td v-if="parseInt((attendence.working_hours).substring(3,5)) > 7">{{attendence.working_hours}}</td>
                                                <td v-else style="background:pink;">{{attendence.working_hours}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                attendences:{},
            }
        },
        methods: {
            loadAttendences(){
                axios.get('api/attendence')
                .then(({data})=>(this.attendences = data))
                .then(()=>($('#indexTable').DataTable()))
                .catch(()=>{this.$Progress.fail();});
            },
        },
        mounted() {
            this.loadAttendences();
            console.log('Component mounted.');
        }
    };
</script>