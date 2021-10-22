<?php

const table_start = '<table class="items-center bg-transparent w-full border-collapse ">';
const table_head_start = '<thead>';
const table_body_start = '<tbody>';
const table_row_start = '<tr>';
const table_header_start = '<th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0
                                whitespace-nowrap font-semibold text-left">';


const table_data_start = '<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">';
const table_data_end = '</td>';


const table_header_end = '</th>';
const table_row_end = '</tr>';
const table_body_end = '</tbody>';
const table_head_end = '</thead>';
const table_end = '</table>';

if (!function_exists('hlp_table')) {
    function hlp_table($col)
    {
        $column = $col[0]->toArray();

        echo table_start;
        echo table_head_start;
        echo table_row_start;


        foreach ($column as $key => $item) {

            echo table_header_start;

            echo $key;

            echo table_header_end;
        }


        echo table_row_end;

        echo table_body_start;


        foreach ($col->toArray() as $item) {
            echo table_row_start;

            foreach ($item as $key => $value) {





                echo table_data_start;

                echo $value;

                echo table_data_end;


            }
            echo table_row_end;

        }


        echo table_body_end;


        echo table_row_end;

    }
}

