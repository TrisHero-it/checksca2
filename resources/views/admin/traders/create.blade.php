@extends('admin.layouts.app')
@section('link')
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
@endsection
    @section('content')
        <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

        </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Thêm người trung gian</h5>
            </div>
            <div class="card-body">
                <form action="/admin-traders" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" aria-describedby="emailHelp"
                               value="{{ old('fullname') }}">
                        @error('fullname')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail5" class="form-label">Zalo - Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                               name="zalo" value="{{ old('zalo') }}">
                        @error('zalo')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail6" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="exampleInputEmail6" aria-describedby="emailHelp"
                               name="img">
                        @error('img')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail6" class="form-label">Ảnh chứng minh nhân dân</label>
                        <input type="file" class="form-control" id="exampleInputEmail6" aria-describedby="emailHelp"
                               name="identity[]" multiple>
                        @error('identity')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>

                    <label  for="">Có là admin của group facebook <img src="{{ asset('images/trader-icon/security.svg') }}"> </label> <br>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="link_facebook" aria-describedby="emailHelp"
                           value="" placeholder="Điền link của group">

                    <label class="mt-3" for="">Có xác thực tài căn cước <img src="{{ asset('images/trader-icon/user.svg') }}"> </label> <br>
                    <div class="d-flex justify-content-between mt-3" style="width: 125px;">
                        <div class="">
                            <input type="radio" value="1" name="identity_verification" id="" checked> <label for="">có</label>
                        </div>
                        <div>
                            <input type="radio" value="0" name="identity_verification" id="" > <label
                                for="">Không</label> <br>
                        </div>
                    </div>

                    <label for="">Có xác thực số điện thoại <img src="{{ asset('images/trader-icon/phone.svg') }}"> </label> <br>
                    <div class="d-flex justify-content-between mt-3" style="width: 125px;">
                        <div class="">
                            <input type="radio" value="1" name="phone_verification" id="" checked> <label for="">có</label>
                        </div>
                        <div>
                            <input type="radio" value="0" name="phone_verification" id="" > <label
                                for="">Không</label> <br>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail5" class="form-label">Vui lòng điền email của người dùng</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                               name="email" value="{{ old('email') }}">
                        @error('email')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail5" class="form-label">Vui lòng điền mật khẩu của người dùng</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                               name="password" value="{{ old('password') }}">
                        @error('password')
                        <div style="color: red"> {{ $message }}</div>
                        @enderror
                    </div>

                    <label
                        class="col-form-label col-lg-4 col-sm-12">Tựa game</label>
                        <select class="form-control" onchange="Category(this.value)" data-trigger
                                name="" id="choices-multiple-default" multiple>
                           @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                           @endforeach
                        </select>
                    <input type="hidden" name="category_id">
                    @error('category_id')
                    <div style="color: red"> {{ $message }}</div>
                    @enderror

                    <label class="mt-3" for="">Loại hợp đồng</label>
                    <select name="contract_id" class="form-select">
                        <option value="">Chưa chọn</option>
                        @foreach ($contracts as $contract)
                            <option value="{{$contract->id}}">
                                {{$contract->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('contract_id')
                    <div style="color: red"> {{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-4">Thêm</button>
                </form>
            </div>
        </div>
    </div>

    <script !src="">
        function Category(value) {
            let arrCate ='';
            let arrCategory = document.querySelectorAll('.choices__list--multiple .choices__item--selectable');
            for (let i=0; i<arrCategory.length; i++) {
                arrCate += i==0?arrCategory[i].dataset.value :','+arrCategory[i].dataset.value
            }
            let CategoryId = document.getElementsByName('category_id')[0];
            CategoryId.value = arrCate
        }
    </script>

    @if(session('success'))
        <script !src="">
            let html = `<div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('images/design/favicon_io/favicon.ico')}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">CheckSca</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                Thêm thành công !!
            </div>
        </div> `
            $('#notification').prepend(html)
            setTimeout(()=> {
                let a = document.getElementById('toast');
                a.style.transition = '0.2s ease all';
                a.style.transform = 'translateX(200%)';
                setTimeout(()=> {
                    document.getElementById('toast').remove()
                }, 1000)
            }, 2000)
        </script>
    @endif

    <script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'This is a search placeholder',
                });
            }

            var textRemove = new Choices(
                document.getElementById('choices-text-remove-button'), {
                    delimiter: ',',
                    editItems: true,
                    maxItemCount: 5,
                    removeItemButton: true,
                }
            );

            var textUniqueVals = new Choices('#choices-text-unique-values', {
                paste: false,
                duplicateItemsAllowed: false,
                editItems: true,
            });

            var texti18n = new Choices('#choices-text-i18n', {
                paste: false,
                duplicateItemsAllowed: false,
                editItems: true,
                maxItemCount: 5,
                addItemText: function (value) {
                    return (
                        'Appuyez sur Entrée pour ajouter <b>"' + String(value) + '"</b>'
                    );
                },
                maxItemText: function (maxItemCount) {
                    return String(maxItemCount) + 'valeurs peuvent être ajoutées';
                },
                uniqueItemText: 'Cette valeur est déjà présente',
            });

            var textEmailFilter = new Choices('#choices-text-email-filter', {
                editItems: true,
                addItemFilter: function (value) {
                    if (!value) {
                        return false;
                    }

                    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    const expression = new RegExp(regex.source, 'i');
                    return expression.test(value);
                },
            }).setValue(['joe@bloggs.com']);

            var textDisabled = new Choices('#choices-text-disabled', {
                addItems: false,
                removeItems: false,
            }).disable();

            var textPrependAppendVal = new Choices(
                '#choices-text-prepend-append-value', {
                    prependValue: 'item-',
                    appendValue: '-' + Date.now(),
                }
            ).removeActiveItems();

            var textPresetVal = new Choices('#choices-text-preset-values', {
                items: [
                    'Josh Johnson',
                    {
                        value: 'joe@bloggs.co.uk',
                        label: 'Joe Bloggs',
                        customProperties: {
                            description: 'Joe Blogg is such a generic name',
                        },
                    },
                ],
            });

            var multipleDefault = new Choices(
                document.getElementById('choices-multiple-groups')
            );

            var multipleFetch = new Choices('#choices-multiple-remote-fetch', {
                placeholder: true,
                placeholderValue: 'Pick an Strokes record',
                maxItemCount: 5,
            }).setChoices(function () {
                return fetch(
                    'https://api.discogs.com/artists/55980/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                )
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        return data.releases.map(function (release) {
                            return {
                                value: release.title,
                                label: release.title
                            };
                        });
                    });
            });

            var multipleCancelButton = new Choices(
                '#choices-multiple-remove-button', {
                    removeItemButton: true,
                }
            );

            /* Use label on event */
            var choicesSelect = new Choices('#choices-multiple-labels', {
                removeItemButton: true,
                choices: [{
                    value: 'One',
                    label: 'Label One'
                },
                    {
                        value: 'Two',
                        label: 'Label Two',
                        disabled: true
                    },
                    {
                        value: 'Three',
                        label: 'Label Three'
                    },
                ],
            }).setChoices(
                [{
                    value: 'Four',
                    label: 'Label Four',
                    disabled: true
                },
                    {
                        value: 'Five',
                        label: 'Label Five'
                    },
                    {
                        value: 'Six',
                        label: 'Label Six',
                        selected: true
                    },
                ],
                'value',
                'label',
                false
            );

            choicesSelect.passedElement.element.addEventListener(
                'addItem',
                function (event) {
                    document.getElementById('message').innerHTML =
                        '<span class="badge bg-light-primary"> You just added "' + event.detail.label + '"</span>';
                }
            );
            choicesSelect.passedElement.element.addEventListener(
                'removeItem',
                function (event) {
                    document.getElementById('message').innerHTML =
                        '<span class="badge bg-light-danger"> You just removed "' + event.detail.label + '"</span>';
                }
            );

            var singleFetch = new Choices('#choices-single-remote-fetch', {
                searchPlaceholderValue: 'Search for an Arctic Monkeys record',
            })
                .setChoices(function () {
                    return fetch(
                        'https://api.discogs.com/artists/391170/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                    )
                        .then(function (response) {
                            return response.json();
                        })
                        .then(function (data) {
                            return data.releases.map(function (release) {
                                return {
                                    label: release.title,
                                    value: release.title
                                };
                            });
                        });
                })
                .then(function (instance) {
                    instance.setChoiceByValue('Fake Tales Of San Francisco');
                });

            var singleXhrRemove = new Choices('#choices-single-remove-xhr', {
                removeItemButton: true,
                searchPlaceholderValue: "Search for a Smiths' record",
            }).setChoices(function (callback) {
                return fetch(
                    'https://api.discogs.com/artists/83080/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                )
                    .then(function (res) {
                        return res.json();
                    })
                    .then(function (data) {
                        return data.releases.map(function (release) {
                            return {
                                label: release.title,
                                value: release.title
                            };
                        });
                    });
            });

            var singleNoSearch = new Choices('#choices-single-no-search', {
                searchEnabled: false,
                removeItemButton: true,
                choices: [{
                    value: 'One',
                    label: 'Label One'
                },
                    {
                        value: 'Two',
                        label: 'Label Two',
                        disabled: true
                    },
                    {
                        value: 'Three',
                        label: 'Label Three'
                    },
                ],
            }).setChoices(
                [{
                    value: 'Four',
                    label: 'Label Four',
                    disabled: true
                },
                    {
                        value: 'Five',
                        label: 'Label Five'
                    },
                    {
                        value: 'Six',
                        label: 'Label Six',
                        selected: true
                    },
                ],
                'value',
                'label',
                false
            );

            var singlePresetOpts = new Choices('#choices-single-preset-options', {
                placeholder: true,
            }).setChoices(
                [{
                    label: 'Group one',
                    id: 1,
                    disabled: false,
                    choices: [{
                        value: 'Child One',
                        label: 'Child One',
                        selected: true
                    },
                        {
                            value: 'Child Two',
                            label: 'Child Two',
                            disabled: true
                        },
                        {
                            value: 'Child Three',
                            label: 'Child Three'
                        },
                    ],
                },
                    {
                        label: 'Group two',
                        id: 2,
                        disabled: false,
                        choices: [{
                            value: 'Child Four',
                            label: 'Child Four',
                            disabled: true
                        },
                            {
                                value: 'Child Five',
                                label: 'Child Five'
                            },
                            {
                                value: 'Child Six',
                                label: 'Child Six'
                            },
                        ],
                    },
                ],
                'value',
                'label'
            );

            var singleSelectedOpt = new Choices('#choices-single-selected-option', {
                searchFields: ['label', 'value', 'customProperties.description'],
                choices: [{
                    value: 'One',
                    label: 'Label One',
                    selected: true
                },
                    {
                        value: 'Two',
                        label: 'Label Two',
                        disabled: true
                    },
                    {
                        value: 'Three',
                        label: 'Label Three',
                        customProperties: {
                            description: 'This option is fantastic',
                        },
                    },
                ],
            }).setChoiceByValue('Two');

            var customChoicesPropertiesViaDataAttributes = new Choices(
                '#choices-with-custom-props-via-html', {
                    searchFields: ['label', 'value', 'customProperties'],
                }
            );

            var singleNoSorting = new Choices('#choices-single-no-sorting', {
                shouldSort: false,
            });

            var cities = new Choices(document.getElementById('cities'));
            var tubeStations = new Choices(
                document.getElementById('tube-stations')
            ).disable();

            cities.passedElement.element.addEventListener('change', function (e) {
                if (e.detail.value === 'London') {
                    tubeStations.enable();
                } else {
                    tubeStations.disable();
                }
            });

            var customTemplates = new Choices(
                document.getElementById('choices-single-custom-templates'), {
                    callbackOnCreateTemplates: function (strToEl) {
                        var classNames = this.config.classNames;
                        var itemSelectText = this.config.itemSelectText;
                        return {
                            item: function (classNames, data) {
                                return strToEl(
                                    '\
                                        <div\
                                        class="' +
                                    String(classNames.item) +
                                    ' ' +
                                    String(
                                        data.highlighted ?
                                            classNames.highlightedState :
                                            classNames.itemSelectable
                                    ) +
                                    '"\
                                        data-item\
                                        data-id="' +
                                    String(data.id) +
                                    '"\
                                        data-value="' +
                                    String(data.value) +
                                    '"\
                                        ' +
                                    String(data.active ? 'aria-selected="true"' : '') +
                                    '\
                                        ' +
                                    String(data.disabled ? 'aria-disabled="true"' : '') +
                                    '\
                                        >\
                                        <span style="margin-right:10px;">🎉</span> ' +
                                    String(data.label) +
                                    '\
                                        </div>\
                                        '
                                );
                            },
                            choice: function (classNames, data) {
                                return strToEl(
                                    '\
                                        <div\
                                        class="' +
                                    String(classNames.item) +
                                    ' ' +
                                    String(classNames.itemChoice) +
                                    ' ' +
                                    String(
                                        data.disabled ?
                                            classNames.itemDisabled :
                                            classNames.itemSelectable
                                    ) +
                                    '"\
                                        data-select-text="' +
                                    String(itemSelectText) +
                                    '"\
                                        data-choice \
                                        ' +
                                    String(
                                        data.disabled ?
                                            'data-choice-disabled aria-disabled="true"' :
                                            'data-choice-selectable'
                                    ) +
                                    '\
                                        data-id="' +
                                    String(data.id) +
                                    '"\
                                        data-value="' +
                                    String(data.value) +
                                    '"\
                                        ' +
                                    String(
                                        data.groupId > 0 ? 'role="treeitem"' : 'role="option"'
                                    ) +
                                    '\
                                        >\
                                        <span style="margin-right:10px;">👉🏽</span> ' +
                                    String(data.label) +
                                    '\
                                        </div>\
                                        '
                                );
                            },
                        };
                    },
                }
            );

            var resetSimple = new Choices(document.getElementById('reset-simple'));

            var resetMultiple = new Choices('#reset-multiple', {
                removeItemButton: true,
            });
        });
    </script>

    <div class="footer-fab">
        <div class="b-bg">
            <i class="fas fa-question"></i>
        </div>
        <div class="fab-hover">
            <ul class="list-unstyled">
                <li><a href="https://html.phoenixcoded.net/dasho/bootstrap/doc/index-bc-package.html" target="_blank" data-text="UI Kit" class="btn btn-icon btn-rounded btn-info m-0"><i class="feather icon-layers"></i></a></li>
                <li><a href="https://html.phoenixcoded.net/dasho/bootstrap/doc/index.html" target="_blank" data-text="Document" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
