<?php
$usuarios = [
    [
        'nome' => 'João',
        'email' => 'email@email.com',
        'status' => 'ativo',
        'encomendas' => [
            [
                'nome' => 'Camiseta',
                'codigoRastramento' => 'ABC-ASC-123',
                'status' => 'em trânsito'
            ]
        ]
    ],
    [
        'nome' => 'Maria',
        'email' => 'maria@email.com',
        'status' => 'inativo',
        'encomendas' => [
            [
                'nome' => 'Teclado',
                'codigoRastramento' => 'XYZ-ASC-111',
                'status' => 'entregue'
            ]
        ]
    ],
    [
        'nome' => 'José',
        'email' => 'jose@email.com',
        'status' => 'ativo',
        'encomendas' => [
            [
                'nome' => 'Monitor',
                'codigoRastramento' => 'GGG-CCC-980',
                'status' => 'barrado'
            ],
            [
                'nome' => 'Computador',
                'codigoRastramento' => 'GGG-CCC-981',
                'status' => 'entregue'
            ]
        ]
    ],
    [
        'nome' => 'Pedro',
        'email' => 'pedro@email.com',
        'status' => 'inativo',
        'encomendas' => [
            [
                'nome' => 'Fone de ouvido',
                'codigoRastramento' => 'KLI-CIC-981',
                'status' => 'entregue'
            ]
        ]
    ],
    [
        'nome' => 'Ana',
        'email' => 'ana@email.com',
        'status' => 'ativo',
        'encomendas' => [
            [
                'nome' => 'Lanterna',
                'codigoRastramento' => 'FFF-CCC-999',
                'status' => 'entregue'
            ]
        ]
    ]
];

function filterUsers($usuarios) {
    $usuariosAtivos = array_filter($usuarios, function($usuario) {
        return $usuario['status'] == 'ativo';
    });
    return $usuariosAtivos;
}

function findOrderStatus($usuarios, $codigoRastramento) {
    foreach ($usuarios as $usuario) {
        foreach ($usuario['encomendas'] as $encomenda) {
            if ($encomenda['codigoRastramento'] == $codigoRastramento) {
                return "{$usuario['nome']}, o status de seu pedido {$encomenda['nome']} com código de rastreamento  {$codigoRastramento} é: {$encomenda['status']}.\n\n";
            }
        }
    }
    return 'Pedido não encontrado.';
}

$usuariosAtivos = filterUsers($usuarios);

echo findOrderStatus($usuariosAtivos, 'ABC-ASC-123');
echo findOrderStatus($usuariosAtivos, 'GGG-CCC-980');

?>
