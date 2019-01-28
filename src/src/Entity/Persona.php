<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona", indexes={@ORM\Index(name="IDX_51E5B69BD7E358F6", columns={"id_estado_civil"}), @ORM\Index(name="IDX_51E5B69B115F934D", columns={"id_proceso_gestion_integral"}), @ORM\Index(name="IDX_51E5B69B86373DD7", columns={"id_genero"})})
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
     * @ORM\Column(name="tipo_sangre", type="text", nullable=true, options={"comment"="Se ingresa el grupo sanguíneo y el Factor del RH solo admite las siguientes letras en el grupo sanguíneo A, B, O. Solo admite los siguientes caracteres en el facto RH +, - ejemplo O+, O-, AB-"})
     */
    private $tipoSangre;

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
     * @ORM\Column(name="correo_electronico1", type="text", nullable=true, options={"comment"="correo electrónico principal de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter Ejemplo  (+57) 310 208 3828."})
     */
    private $correoElectronico1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo_electronico2", type="text", nullable=true, options={"comment"="correo electrónico secundario de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter ."})
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
     * @var \Genero
     *
     * @ORM\ManyToOne(targetEntity="Genero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_genero", referencedColumnName="id")
     * })
     */
    private $idGenero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimerNombre(): ?string
    {
        return $this->primerNombre;
    }

    public function setPrimerNombre(?string $primerNombre): self
    {
        $this->primerNombre = $primerNombre;

        return $this;
    }

    public function getOtroNombre(): ?string
    {
        return $this->otroNombre;
    }

    public function setOtroNombre(?string $otroNombre): self
    {
        $this->otroNombre = $otroNombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido(?string $primerApellido): self
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido(?string $segundoApellido): self
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?string $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getNumeroDocumento(): ?string
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento(?string $numeroDocumento): self
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    public function getFechaExpedicionDocumento(): ?\DateTimeInterface
    {
        return $this->fechaExpedicionDocumento;
    }

    public function setFechaExpedicionDocumento(?\DateTimeInterface $fechaExpedicionDocumento): self
    {
        $this->fechaExpedicionDocumento = $fechaExpedicionDocumento;

        return $this;
    }

    public function getLugarEspecionDocumento(): ?string
    {
        return $this->lugarEspecionDocumento;
    }

    public function setLugarEspecionDocumento(?string $lugarEspecionDocumento): self
    {
        $this->lugarEspecionDocumento = $lugarEspecionDocumento;

        return $this;
    }

    public function getTipoSangre(): ?string
    {
        return $this->tipoSangre;
    }

    public function setTipoSangre(?string $tipoSangre): self
    {
        $this->tipoSangre = $tipoSangre;

        return $this;
    }

    public function getTelefonoFijo(): ?string
    {
        return $this->telefonoFijo;
    }

    public function setTelefonoFijo(?string $telefonoFijo): self
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    public function getTelefonoMovil1(): ?string
    {
        return $this->telefonoMovil1;
    }

    public function setTelefonoMovil1(?string $telefonoMovil1): self
    {
        $this->telefonoMovil1 = $telefonoMovil1;

        return $this;
    }

    public function getTelefonoMovil2(): ?string
    {
        return $this->telefonoMovil2;
    }

    public function setTelefonoMovil2(?string $telefonoMovil2): self
    {
        $this->telefonoMovil2 = $telefonoMovil2;

        return $this;
    }

    public function getCorreoElectronico1(): ?string
    {
        return $this->correoElectronico1;
    }

    public function setCorreoElectronico1(?string $correoElectronico1): self
    {
        $this->correoElectronico1 = $correoElectronico1;

        return $this;
    }

    public function getCorreoElectronico2(): ?string
    {
        return $this->correoElectronico2;
    }

    public function setCorreoElectronico2(?string $correoElectronico2): self
    {
        $this->correoElectronico2 = $correoElectronico2;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getIdEstadoCivil(): ?EstadoCivil
    {
        return $this->idEstadoCivil;
    }

    public function setIdEstadoCivil(?EstadoCivil $idEstadoCivil): self
    {
        $this->idEstadoCivil = $idEstadoCivil;

        return $this;
    }

    public function getIdProcesoGestionIntegral(): ?ProcesoGestionIntegral
    {
        return $this->idProcesoGestionIntegral;
    }

    public function setIdProcesoGestionIntegral(?ProcesoGestionIntegral $idProcesoGestionIntegral): self
    {
        $this->idProcesoGestionIntegral = $idProcesoGestionIntegral;

        return $this;
    }

    public function getIdGenero(): ?Genero
    {
        return $this->idGenero;
    }

    public function setIdGenero(?Genero $idGenero): self
    {
        $this->idGenero = $idGenero;

        return $this;
    }

    /**
     * Get display name
     *
     * @return String
     */
    public function __toString()
    {
        return strtoupper($this->getPrimerNombre() . ' ' . $this->getOtroNombre() .
        ' ' . $this->getPrimerApellido() . ' ' . $this->getSegundoApellido());
    }

}
