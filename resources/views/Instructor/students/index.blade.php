@extends('layouts.instructor.app')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-users bg-blue"></i>
                <div class="d-inline">
                    <h2>Students</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="cpIndex.html"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Students</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Customer overview start -->
<div class="row mt-40">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Student Table :</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body progress-task">
                <div class="dd" data-plugin="nestable">
                    <div class="table-responsive">
                        <table id="advanced_table"
                            class="table   table-bordered table-hover mb-0"
                            data-repeater-list="category-group">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Name </th>
                                    <th>G.Quizes</th>
                                    <th>G.Assignments</th>
                                    <th>G.Mid </th>
                                    <th>G.Oral</th>
                                    <th>G.Project</th>
                                    <th>G.lab</th>
                                    <th>G.attend</th>
                                    <th>Total of Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-control"
                                            type="number"></td>
                                    <td><input class="form-control" type="text" value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Quizes" calcu="G-Quizes"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Assignments" calcu="G-Assignments"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Mid" calcu="G-Mid" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Oral" calcu="G-Oral" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Project" calcu="G-Project"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-lab" calcu="G-lab" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-attend" calcu="G-attend"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control" type="text"
                                            name="Total-of-Grade" calcu="Total-of-Grade"
                                            jAutoCalc="{G-Quizes} + {G-Assignments} + {G-Mid}+{G-Oral} + {G-Project} + {G-lab} + {G-attend}"
                                            value=""></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input class="form-control"
                                            type="number"></td>
                                    <td><input class="form-control" type="text" value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Quizes" calcu="G-Quizes"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Assignments" calcu="G-Assignments"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Mid" calcu="G-Mid" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Oral" calcu="G-Oral" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Project" calcu="G-Project"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-lab" calcu="G-lab" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-attend" calcu="G-attend"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control" type="text"
                                            name="Total-of-Grade" calcu="Total-of-Grade"
                                            jAutoCalc="{G-Quizes} + {G-Assignments} + {G-Mid}+{G-Oral} + {G-Project} + {G-lab} + {G-attend}"
                                            value=""></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input class="form-control"
                                            type="number"></td>
                                    <td><input class="form-control" type="text" value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Quizes" calcu="G-Quizes"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Assignments" calcu="G-Assignments"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Mid" calcu="G-Mid" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Oral" calcu="G-Oral" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-Project" calcu="G-Project"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-lab" calcu="G-lab" value="">
                                    </td>
                                    <td class="text-center"><input class="form-control"
                                            type="number" name="G-attend" calcu="G-attend"
                                            value=""></td>
                                    <td class="text-center"><input class="form-control" type="text"
                                            name="Total-of-Grade" calcu="Total-of-Grade"
                                            jAutoCalc="{G-Quizes} + {G-Assignments} + {G-Mid}+{G-Oral} + {G-Project} + {G-lab} + {G-attend}"
                                            value=""></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection                