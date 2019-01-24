<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona", indexes={@ORM\Index(name="IDX_51E5B69BD7E358F6", columns={"id_estado_civil"}), @ORM\Index(name="IDX_51E5B69B115F934D", columns={"id_proceso_gestion_integral"}), @ORM\Index(name="IDX_51E5B69B9B1A19BB", columns={"id_entidad"}), @ORM\Index(name="IDX_51E5B69B86373DD7", columns={"id_genero"})})
 * @ORM\Entity
 */
class Persona
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="persona_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="primer_nombre", type="text", nullable=true, options={"comment"="Primer Nombre de la persona"})
     */
    private $primerNombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="otro_nombre", type="text", nullable=true, options={"comment"="Segundos y terceros nombres de la persona"})
     */
    private $otroNombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="primer_apellido", type="text", nullable=true, options={"comment"="Primer Apellido de la Persona"})
     */
    private $primerApellido;

    /**
     * @var string|null
     *
     * @ORM\Column(name="segundo_apellido", type="text", nullable=true, options={"comment"="Segundo Apellido de la persona"})
     */
    private $segundoApellido;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true, options={"comment"="Fecha de nacimiento de la persona en el formato aaaa-mm-dd"})
     */
    private $fechaNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_documento", type="text", nullable=true, options={"comment"="Identifica el tipo de documento de la persona solo admite los siguientes valores RC = Registro Civil, TI = Tarjeta de identidad, CC=Cedula de Ciudadania, CE = Cedula de Extranjeria"})
     */
    private $tipoDocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_documento", type="text", nullable=true, options={"comment"="Solo admite datos tipos numéricos para los casos RC, TI, CC, Para la cedula de extranjería admite según formato de la registraduria civil"})
     */
    private $numeroDocumento;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_expedicion_documento", type="date", nullable=true)
     */
    private $fechaExpedicionDocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lugar_especion_documento", type="text", nullable=true, options={"comment"="Lugar en donde se expide el documento de identidad"})
     */
    private $lugarEspecionDocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_sangre", type="text", nullable=true, options={"comment"="Se ingresa el grupo sanguíneo y el Factor del RH solo admite las siguientes letras en el grupo sanguíneo A, B, O. Solo admite los siguientes caracteres en el facto RH "+", "-" ejemplo "O+", "O-", "AB-"})
     */
    private $tipoSangre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="direccion", type="text", nullable=true, options={"comment"="Dirección donde reside la persona"})
     */
    private $direccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_fijo", type="text", nullable=true, options={"comment"="Telefono fijo donde reside la persona"})
     */
    private $telefonoFijo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_movil1", type="text", nullable=true, options={"comment"="Teléfono móvil de la persona con indicativo del país si reside fuera de Colombia, ejemplo (+57) 310 208 3828"})
     */
    private $telefonoMovil1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_movil2", type="text", nullable=true, options={"comment"="numeró teléfono móvil alterno, ejemplo (+57) 310 208 3828"})
     */
    private $telefonoMovil2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo_electronico1", type="text", nullable=true, options={"comment"="correo electrónico principal de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter Ejemplo  (+57) 310 208 3828".""})
     */
    private $correoElectronico1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo_electronico2", type="text", nullable=true, options={"comment"="correo electrónico secundario de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter ".""})
     */
    private $correoElectronico2;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="valor booleano que permite retratar si el usuario se encuentra activo dentro de la base de datos, y permite incluirlo en busquedas según clasificaciones propias de toda la base de datos"})
     */
    private $activo;

    /**
     * @var \EstadoCivil
     *
     * @ORM\ManyToOne(targetEntity="EstadoCivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_civil", referencedColumnName="id")
     * })
     */
    private $idEstadoCivil;

    /**
     * @var \ProcesoGestionIntegral
     *
     * @ORM\ManyToOne(targetEntity="ProcesoGestionIntegral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_gestion_integral", referencedColumnName="id")
     * })
     */
    private $idProcesoGestionIntegral;

    /**
     * @var \Entidad
     *
     * @ORM\ManyToOne(targetEntity="Entidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entidad", referencedColumnName="id")
     * })
     */
    private $idEntidad;

    /**
     * @var \Genero
     *
     * @ORM\ManyToOne(targetEntity="Genero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_genero", referencedColumnName="id")
     * })
     */
    private $idGenero;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vivienda", inversedBy="idPersona")
     * @ORM\JoinTable(name="muchos_persona_tiene_muchos_vivienda",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_vivienda", referencedColumnName="id")
     *   }
     * )
     */
    private $idVivienda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idVivienda = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
