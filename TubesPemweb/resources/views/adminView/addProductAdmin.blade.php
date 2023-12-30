<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN</title>
</head>

<body>

    <hr>
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="">INSERT NEW PRODUCT</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label>Choose Category</label>
                </td>
                <td>
                    <select class="form-control" id="categoriesOption" name="categoriesOption">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categoryList as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}


                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Product Name</label>
                </td>
                <td>
                    <input type="text" class="border">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Description</label>
                </td>
                <td>
                    <input type="textarea" class="border">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Product variants</label>
                </td>
<<<<<<< HEAD
                {{-- <td>

                    <div id="discussion-container">
                        <div id="discussions">
                            <div class="discussion">

                                No. = 1
                                <input class="form-control" type="text" name="discussion[]"
                                    placeholder="Please fill before adding Actions" style="height: 100px;">
                                <!--   <input type="button" class="addAction" value="Add Action" data-discussion-index="0"> -->

                                <button type="button" class="addAction" value="Add Action" data-discussion-index="0"
                                    class=" btn btn-outline-secondary ">
                                    <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                                            class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Action
                                </button>

                                <div class="actions">
                                    <table class="table">
                                        <tr>
                                            <th>Follow Up Action:</th>
                                            <th>Due Date:</th>
                                            <th>PIC:</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="item[0][]" id="item_0"
                                                    placeholder="Follow Up Action"></td>
                                            <td><input type="date" name="due[0][]" id="due_0"
                                                    placeholder="Due Date">
                                            </td>
                                            <td>
                                                <select name="pic[0][]" id="pic_0">
                                                    <option value="0">Select PIC</option>
                                                    @foreach ($peserta_tersedia as $option)
                                                        <option value="{{ $option['id'] }}">{{ $option['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- <input type="button" id="addDiscussion" value="Add Discussion"
                                                                                                                                                                                    class="btn btn-outline-primary float-right btn-sm add-action"> -->

                        <button id="addDiscussion" value="Add Discussion" type="button"
                            class="btn btn-outline-primary float-right btn-sm add-action">
                            <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                                    class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Item Diskusi
                        </button>



                    </div>
                </td> --}}
=======
                <td>
                    <input type="" class="border">
                </td>
>>>>>>> bedb74b8ba937a3829e593c73c75a870ef0125ba
            </tr>





        </table>

    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
